<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Blacklist;
use DataTables;
use App\Models\Admin\SiteConfig;
use Illuminate\Support\Str;
use App\Imports\BlacklistImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\Blacklist\ImportValidation;
use Carbon\Carbon;

class BlacklistController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.blacklist';
    protected $view_path = 'admin.blacklist';
    protected $panel = 'Blacklist';

    public function __construct()
    {
        $this->model = new Blacklist();
    }

    public function index()
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        $data = [];
        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('data'));
    }
    public function getBlacklist(Request $request)
    {
        ini_set('memory_limit', '-1');
        if ($request->ajax()) {
           
            $data = collect(Blacklist::select('black_list_no as BlacklistNo', 'black_list_date as BlacklistDate', 'borrower_name as BorrowerName', 'associated_person_or_firm as AssociatedWith')->get()->toArray());
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getImportForm()
    {
        abort_unless(\Gate::allows('import-'.Str::lower($this->panel)), 403);
        $data =[];
        $data['rows'] = SiteConfig::whereIn('config_keys', ['blacklist_published_at', 'blacklist_published_at_bs'])->pluck('config_values', 'config_keys');
        return view(parent::loadDefaultDataToView($this->view_path . '.import'), compact('data'));
    }

    public function importStore(ImportValidation $request)
    {
        abort_unless(\Gate::allows('import-'.Str::lower($this->panel)), 403);
        $this->model->truncate();
        DB::beginTransaction();

        $published_at = SiteConfig::updateOrCreate(
            ['config_keys' =>  'blacklist_published_at'],
            ['config_values' => request('blacklist_published_at')]
        );
        $published_at_bs = SiteConfig::updateOrCreate(
            ['config_keys' =>  'blacklist_published_at_bs'],
            ['config_values' => request('blacklist_published_at_bs')]
        );
        if($request->file('import_file'))
        {

            $collection = Excel::toCollection(new BlacklistImport, $request->file('import_file'));
            
            $table_title_key = [];

            $data_to_insert = [] ; 

            $error_bag = [];

            

            foreach($collection as $sheet_number => $each_sheet) {

                foreach($each_sheet->first() as $key=>$title)
                {
                    foreach(config('custom.blacklist_import_head') as $t_key => $t_name)
                    {
                        foreach($t_name as $config_name)
                        {
                            if($config_name == $title)
                            {
                                $table_title_key[$key] = $t_key;
                                break;
                                break;
                                break;
                            }
                        }
                    }
                }
                if(count($table_title_key) != 4)
                {
                    $error_bag[] = [
                        'Invalid headings (Coulmn Title) Please See Note for more info.',
                    ];
                    break;
                }
                // $each_sheet->shift();
                $each_sheet->shift();
                foreach ($each_sheet as $data_key=> $sheet_data) {

                    if($sheet_data[0] != null)
                    {
                        $data_to_insert = [];
                        foreach ($sheet_data as $t_key => $data) {

                            if(isset($table_title_key[$t_key]))
                            {
                                $title_key = $table_title_key[$t_key];
                                if($title_key == 'black_list_date')
                                {
                                    $array_data = explode("-", $data);
                                    if(count($array_data) == 1)
                                    {
                                        $date_string = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($data)->format('Y-m-d');;
                                        $data_to_insert[$title_key] = $date_string;
                                    }
                                    else
                                    $data_to_insert[$title_key] = $data;
                                }
                                else
                                $data_to_insert[$title_key] = $data;  
                            }

                        }
                            
                            $this->model->create($data_to_insert);
                        
                    }

                }
            }
            if(count($error_bag) >=1)
            {
                DB::rollback();
                $request->session()->flash('error_bag', $error_bag);
                return redirect()->back();

            }
        }

        DB::commit();
        $request->session()->flash('success_message', $this->panel . ' updated successfully.');
        return parent::redirectRequest($request);
        
    } 
}
