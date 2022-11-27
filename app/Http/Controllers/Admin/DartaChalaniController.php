<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\DartaChalani;
use App\Models\Admin\Courts;
use App\Models\ActivityLog;

use App\Http\Requests\Admin\DartaChalani\AddFormValidation;
use App\Http\Requests\Admin\DartaChalani\EditFormValidation;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\Storage;
use App\Libraries\HelperClass\ViewHelper;
use App\User;
use Auth;

class DartaChalaniController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.darta_chalani';
    protected $view_path = 'admin.darta_chalani';
    protected $image_name = null;
    protected $image_dimensions;
    protected $panel = 'Darta Chalani';
    protected $folder;
    protected $folder_path;

    public function __construct(DartaChalani $darta_chalani)
    {
         $this->model = $darta_chalani;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        $data = [];
        $data['per_page'] = $request->per_page ? $request->per_page : 10;
        $data['rows'] = $this->model
            ->select( 'offices.name_np as office_name','darta_chalanis.*')
            ->LeftJoin('offices', 'darta_chalanis.office_id','=','offices.id');
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['rows'] = $data['rows']->where('darta_chalanis.office_id', Auth::user()->office_id);
            
        }
        if ($request->get('data-show') == 'trashed') {
            $data['rows'] = $data['rows']->onlyTrashed();
            $data['is_trash'] = true;
        }
        else 
        {
            $data['rows'] = $data['rows']->where(function ($query) use ($request){
                if ($request->has('filter_register_number') && $request->get('filter_register_number')) {
                    $query->Where('darta_chalanis.register_number', 'like', '%'. $request->get('filter_register_number').'%');
                }
                if ($request->has('filter_subject') && $request->get('filter_subject')) {
                    $query->Where('darta_chalanis.subject', 'like', '%'. $request->get('filter_subject').'%');
                }
                if ($request->has('filter_record_type') && $request->get('filter_record_type') && $request->get('filter_record_type') !== 'all') {
                    $query->where('darta_chalanis.record_type', $request->get('filter_record_type'));
                }
                if ($request->has('filter_fiscal_year') && $request->get('filter_fiscal_year') && $request->get('filter_fiscal_year') !== 'all') {
                    $query->where('darta_chalanis.fiscal_year', $request->get('filter_fiscal_year'));
                }
                if ($request->has('filter_registered_at') && $request->get('filter_registered_at')) {
                    $query->where('darta_chalanis.registered_at', 'like', $request->get('filter_registered_at').'%');
                }
                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('darta_chalanis.status', $request->get('filter_status') == 'active'?1:0);
                }
            });
            $data['is_trash'] = false;
        }
        $data['rows'] = $data['rows']->orderby('registered_at', 'desc')->paginate($data['per_page']);

        $data['request'] = $request->all();
        $data['record_types']= ['' => 'सबै']+ config('custom.record_types');
        $data['fiscal_years']= ['' => 'आ.व. छान्नुहोस्']+ config('custom.fiscal_year');

        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);

        $data = [];

        $data['fiscal_years']= ['' => 'आ.व. छान्नुहोस्']+ config('custom.fiscal_year');

        if($request->get('record_type')== 'darta')
        {
            $data['record_type'] = 'darta';

        }
        elseif($request->get('record_type')== 'chalani')
        {
            $data['record_type'] = 'chalani';

        }
        else{
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        $data['row'] = $this->model->select('record_type', 'register_number','fiscal_year')->where('office_id', Auth::user()->office_id)->where('record_type', $request->get('record_type'))->orderBy('created_at', 'desc')->first();
        if($data['row'])
            $data['row']->register_number = $data['row']->register_number + 1;

        return view(parent::loadDefaultDataToView($this->view_path.'.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFormValidation $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 
        $generated_record_id = '';
        $type = $request->get('record_type');
        $fiscal_year = $request->get('fiscal_year');
        $register_number = ViewHelper::convertNumberNpToEn($request->get('register_number'));

        if($type == 'darta'){
            $generated_record_id = 'D-'.Auth::user()->office_id.'-'.$fiscal_year.'-'.$register_number;
            $error_message = 'दर्ता नं: '.$register_number.' पहिले नै प्रयोग गरि सकिएको छ। क ृपया नयाँ दर्ता नं प्रयोग गर्नुहोस ।';
        }
        elseif($type == 'chalani'){
            $generated_record_id = 'C-'.Auth::user()->office_id.'-'.$fiscal_year.'-'.$register_number;
            $error_message = 'चलानी नं:'.$register_number.' पहिले नै प्रयोग गरि सकिएको छ। क ृपया नयाँ चलानी नं प्रयोग गर्नुहोस ।';
        }
        else{
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $check = $this->model->where('record_id', $generated_record_id);
        if(!Auth::user()->hasRole('super-admin'))
        {
            $check = $check->where('darta_chalanis.office_id', Auth::user()->office_id);  
        }
        $check = $check->first();
        if($check)
        {
            $request->session()->flash('error_message', $error_message);
            return redirect()->back()->withInput();
        }
        $filename = '';
        if($request->file('filename') != null)
        {
            $file = $request->file('filename');

            $file_size = $file->getSize();
            $upload_max_filesize_kilobytes = Helper::parse_size(config('custom.filesize'));
            $upload_max_filesize_bytes     = $upload_max_filesize_kilobytes * 1024 ;

            if ($file_size < $upload_max_filesize_bytes && $file_size != 0 && $file->isValid())
            {
                $allowedfileExtension = config('custom.allowedDocExtension');
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                if (!$check)
                {
                    DB::rollBack();
                    // rmdir(storage_path('public/darta_chalani/'.$generated_record_id));
                    $request->session()->flash('error_message', $extension . '.not allowed. The attachment must be an image or pdf.');
                    return redirect()->route($this->base_route . '.index');
                }

                $original_name = explode('.',$file->getClientOriginalName())[0];
                $original_name = str_split($original_name, 100)[0] ;
                $filename = time().'-'.$original_name.'.'.$file->getClientOriginalExtension();

                $path = $file->storeAs('public/darta_chalani/'.$generated_record_id, $filename);
            }
            else
            {
                DB::rollBack();
                // rmdir(storage_path('public/darta_chalani/'.$generated_record_id));
                $request->session()->flash('error_message', "File upload failed. The file may not be greater than ".(int)($upload_max_filesize_kilobytes/1024 )."MB.");
                return redirect()->back()->withInput();
            }
        }

        $darta_chalani = $this->model->create([
            'record_id' => $generated_record_id,
            'record_type' => $request->get('record_type'),
            'register_number' => $register_number,
            'fiscal_year' => $request->get('fiscal_year'),
            'registered_at' => $request->get('registered_at'),
            'subject' => $request->get('subject'),
            'office_or_person' => $request->get('office_or_person'),
            'filename' => $filename,
            'identity_person' => $request->get('identity_person'),
            'remarks' => $request->get('remarks'),
            'status' => $request->get('status'),
            'user_id' => Auth::user()->id,
            'office_id' => Auth::user()->office_id,
        ]);

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Add a new document :'.$this->panel .' <a href="' . route($this->base_route . '.show', $generated_record_id) . '">' . $generated_record_id . '</a>', $this->panel, $generated_record_id, 'created');
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' added successfully.');
        return parent::redirectRequest($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $record_id)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);

        $data = [];
        $data['row'] = $this->model->withTrashed()->where('record_id', $record_id);
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->where('darta_chalanis.office_id', Auth::user()->office_id);
        }
        $data['row'] = $data['row']->first();
        
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data['activitylogs'] = ActivityLog::where('panel', $this->panel)->where('panel_id', $record_id)->where('status', 1)->orderBy('created_at', 'desc')->paginate(10);

        return view(parent::loadDefaultDataToView($this->view_path.'.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);

        $data = [];
        $data['row'] = $this->model->where('id', $id);

        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->where('darta_chalanis.office_id', Auth::user()->office_id);
            
        }
        $data['row'] = $data['row']->first();


        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data['record_types']= ['' => 'सबै']+ config('custom.record_types');

        $data['fiscal_years']= ['' => 'आ.व. छान्नुहोस्']+ config('custom.fiscal_year');

        if($data['row']->record_type == 'darta')
        {
            $data['record_type'] = 'darta';

        }
        elseif($data['row']->record_type == 'chalani')
        {
            $data['record_type'] = 'chalani';

        }
        else{
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        return view(parent::loadDefaultDataToView($this->view_path.'.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFormValidation $request, $id)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 
        $data = [];
        $type = $request->get('record_type');
        $generated_record_id = '';
        $fiscal_year = $request->get('fiscal_year');
        $register_number = ViewHelper::convertNumberNpToEn($request->get('register_number'));

        $data['row'] =  $this->model->where('id', $id);
        if(!Auth::user()->hasRole('super-admin'))
            $data['row'] = $data['row']->where('darta_chalanis.office_id', Auth::user()->office_id);  
        $data['row'] = $data['row']->first();

        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }



        if($type == 'darta'){
            $generated_record_id = 'D-'.$data['row']->office_id.'-'.$fiscal_year.'-'.$register_number;
            $error_message = 'दर्ता नं: '.$register_number.' पहिले नै प्रयोग गरि सकिएको छ। क ृपया नयाँ दर्ता नं प्रयोग गर्नुहोस ।';
        }
        elseif($type == 'chalani'){
            $generated_record_id = 'C-'.$data['row']->office_id.'-'.$fiscal_year.'-'.$register_number;
            $error_message = 'चलानी नं:'.$register_number.' पहिले नै प्रयोग गरि सकिएको छ। क ृपया नयाँ चलानी नं प्रयोग गर्नुहोस ।';
        }
        else{
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        

        if($data['row']->record_id != $generated_record_id)
        {
            $check = $this->model->where('record_id', $generated_record_id);
            if(!Auth::user()->hasRole('super-admin'))
            {
                $check = $check->where('darta_chalanis.office_id', Auth::user()->office_id);  
            }
            $check = $check->first();

            if($check)
            {
                $request->session()->flash('error_message', $error_message);
                return redirect()->back()->withInput();
            }
            else
            {
                if($data['row']->filename)
                {
                    $old_file_link = 'public/darta_chalani/'.$data['row']->record_id;
                    $new_file_link = 'public/darta_chalani/'.$generated_record_id;
                    Storage::move($old_file_link, $new_file_link);
                }
            }
        }
        $filename = '';

        if($request->file('filename') != null)
        {
                $file = $request->file('filename');

           		$file_size = $file->getSize();
                $upload_max_filesize_kilobytes = Helper::parse_size(config('custom.filesize'));;
                $upload_max_filesize_bytes     = $upload_max_filesize_kilobytes * 1024 ;

                if ($file_size < $upload_max_filesize_bytes && $file_size != 0 && $file->isValid())
                {
                	$allowedfileExtension = config('custom.allowedDocExtension');
		            $extension = $file->getClientOriginalExtension();
		            $check = in_array($extension, $allowedfileExtension);
                    if (!$check)
                    {
                    	DB::rollBack();
                    	rmdir(storage_path('public/darta_chalani/'.$generated_record_id));
                        $request->session()->flash('error_message', $extension . '.not allowed. The attachment must be an image or pdf.');
		            	return redirect()->route($this->base_route . '.index');
                    }

                    $original_name = explode('.',$file->getClientOriginalName())[0];
                    $original_name = str_split($original_name, 100)[0] ;
                    $filename = time().'-'.$original_name.'.'.$file->getClientOriginalExtension();

                    $path = $file->storeAs('public/darta_chalani/'.$generated_record_id, $filename);
                }
                else
                {
                	DB::rollBack();
                    rmdir(storage_path('public/darta_chalani/'.$generated_record_id));
                    $request->session()->flash('error_message', "File upload failed. The file may not be greater than ".(int)($upload_max_filesize_kilobytes/1024 )."MB.");
                    return redirect()->back()->withInput();
                }
        }

        $update_data = [
            'record_id' => $generated_record_id,
            'record_type' => $request->get('record_type'),
            'fiscal_year' => $fiscal_year,
            'register_number' => $register_number,
            'registered_at' => $request->get('registered_at'),
            'subject' => $request->get('subject'),
            'office_or_person' => $request->get('office_or_person'),
            'identity_person' => $request->get('identity_person'),
            'remarks' => $request->get('remarks'),
            'status' => $request->get('status'),
        ];
        if($request->file('filename') != null)
        {
            $update_data['filename'] = $filename;
        }

        $this->model->find($id)->update($update_data);


        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('update a '.$this->panel .' <a href="' . route($this->base_route . '.show', $generated_record_id) . '">' . $generated_record_id . '</a>', $this->panel, $generated_record_id, 'updated');
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' updated successfully.');
        return parent::redirectRequest($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request, $id)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);

        $data = [];
        DB::beginTransaction();
        $data['row'] = $this->model->where('id', $id);
        if(!Auth::user()->hasRole('super-admin'))
            $data['row'] = $data['row']->where('darta_chalanis.office_id', Auth::user()->office_id);
        $data['row'] = $data['row']->first();

        if (!$this->delete($data['row'])) {
            DB::rollback();
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('delete a '.$this->panel .' <a href="' . route($this->base_route . '.show', $data['row']->record_id) . '">' . $data['row']->record_id. '</a>', $this->panel, $data['row']->record_id, 'deleted');
        DB::commit();

        $request->session()->flash('success_message', $this->panel.' deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * restore the specified resource from trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        abort_unless(\Gate::allows('restore-'.Str::lower($this->panel)), 403);
        $data = [];
        DB::beginTransaction();

        $data['row'] = $this->model->where('id', $id);
        if(!Auth::user()->hasRole('super-admin'))
            $data['row'] = $data['row']->where('darta_chalanis.office_id', Auth::user()->office_id);
        $data['row'] = $data['row']->onlyTrashed()->first();

        if (!$data['row']->restore()) {
            DB::rollback();
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('restore a '.$this->panel .' <a href="' . route($this->base_route . '.show', $data['row']->record_id) . '">' . $data['row']->record_id . '</a>', $this->panel, $data['row']->record_id, 'restored');
        DB::commit();
        // ActivityLog::makeActivity('restore a post <a href ="'.route($this->base_route.'.show', $id).'" >'.$data['row']->title.'</a>', 'post', $id, 'restored');

        $request->session()->flash('success_message', $this->panel.' restore successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * restore the specified resource from trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Request $request, $id)
    {
        abort_unless(\Gate::allows('forceDelete-'.Str::lower($this->panel)), 403);
        $data = [];
        DB::beginTransaction();
        $data['row'] = $this->model->where('id', $id);
        if(!Auth::user()->hasRole('super-admin'))
            $data['row'] = $data['row']->where('darta_chalanis.office_id', Auth::user()->office_id);
        $data['row'] = $data['row']->onlyTrashed()->first();

        if (!$data['row']->forceDelete()) {
            DB::rollback();
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $check = Storage::deleteDirectory('public/darta_chalani/'.$data['row']->record_id);

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('permanently delete a '.$this->panel .' <a href="' . route($this->base_route . '.show', $data['row']->record_id) . '">' . $data['row']->record_id . '</a>', $this->panel, $data['row']->record_id, 'restored');
        DB::commit();
        // ActivityLog::where('panel', 'post')->where('panel_id', $id)->update(['status'=> 0]);

        // ActivityLog::makeActivity('permanently delete a  post  '.$data['row']->title, 'post', $id, 'forceDeleted');

        $request->session()->flash('success_message', $this->panel.' delete permanently.');
        return redirect()->route($this->base_route.'.index');
    }

    protected function delete($row)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);
        if (!$row || !$row->isDeletable()) {
            return false;
        }
        $row->delete();
        return true;
    }

    public function getFile(Request $request, $record_id, $filename)
    {
        $data['row'] = $this->model->withTrashed()->where('record_id', $record_id);
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->where('darta_chalanis.office_id', Auth::user()->office_id);
        }
        $data['row'] = $data['row']->first();
        
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        else{
            $link = storage_path('app/public/darta_chalani/'.$record_id.'/'.$filename);
            return response()->download($link, null, [], null);
        }
        
    }

    public function deleteFile(Request $request, $record_id, $filename)
    {
        DB::beginTransaction(); 

        $darta_chalani  = $this->model->where('record_id', $record_id);
        if(!Auth::user()->hasRole('super-admin'))
            $darta_chalani  = $darta_chalani ->where('darta_chalanis.office_id', Auth::user()->office_id);
        $darta_chalani  = $darta_chalani->first();

            if($filename!= null && $darta_chalani != null)
            {
                if($filename == $darta_chalani->filename )
                {
                    $check = Storage::delete('public/darta_chalani/'.$record_id.'/'.$filename);
                    if($check)
                        $darta_chalani->update(['filename'=>'']); 
                    else
                    {
                        $request->session()->flash('error_message', "Unable to Delete File");
                        return redirect()->back()->withInput();
                    }
                }
            }

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('delete a file of the case file  <a href="'.route($this->base_route.'.show', $record_id).'">'.$filename.'</a>', $this->panel, $request->record_id, 'deleted');
        DB::commit();
        $request->session()->flash('success_message', "File Deleted Succesfully!");
        return back();

    }

}

