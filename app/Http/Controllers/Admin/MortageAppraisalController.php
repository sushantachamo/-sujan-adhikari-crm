<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Application;
use App\Models\Admin\MortgageAppraisal;

use App\Http\Requests\Admin\MortgageAppraisal\AddFormValidation;
use App\Http\Requests\Admin\MortgageAppraisal\EditFormValidation;
use Illuminate\Support\Str;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;
use App\Models\Address\Countries;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\LocalGovt;
use App\Models\Admin\Office;
use App\Libraries\HelperClass\ViewHelper;
use Storage;
use App\Services\DateConverter;

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings as PhpWordSetting;
use PhpOffice\PhpWord\PhpWord as PhpWord;
use PhpOffice\PhpWord\IOFactory as IOFactory;
use PhpOffice\PhpWord\Writer\HTML as WordHtml;


use Illuminate\Support\Facades\File;
use Mail;

use Mpdf\Mpdf as PDF;

use Carbon\Carbon;

class MortageAppraisalController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.mortgage_appraisal';
    protected $view_path = 'admin.mortgage_appraisal';
    protected $image_name = null;
    protected $image_dimensions;
    protected $panel = 'Mortgage Appraisal';
    protected $folder;
    protected $folder_path;

    public function __construct(MortgageAppraisal $mortgage_appraisal)
    {
         $this->model = $mortgage_appraisal;
         $this->folder = config('myPath.assets.panel_image_folders.mortgage_appraisal');
         $this->folder_path = public_path('images'.DIRECTORY_SEPARATOR.$this->folder);
         $this->image_dimensions = config('myPath.image-dimensions.'.$this->folder);
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
            ->select('offices.name_np as office_name','offices.head_office as head_office','offices.tole as office_tole', 'applications.borrower_name', 'applications.contact_number', 'mortgage_appraisals.total_assessment_value', 'mortgage_appraisals.id', 'mortgage_appraisals.collateral_type','mortgage_appraisals.application_id', 'other_details.reviewed_by as reviewed_by', 'other_details.approved_by as approved_by')
            ->LeftJoin('applications', 'mortgage_appraisals.application_id','=','applications.application_id')
            ->LeftJoin('other_details', 'mortgage_appraisals.application_id','=','other_details.application_id')
            ->LeftJoin('offices', 'mortgage_appraisals.office_id','=','offices.id');
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['rows'] = $data['rows']->whereOffice(Auth::user()->office_id);
        }

        if ($request->get('data-show') == 'trashed') {
            $data['rows'] = $data['rows']->onlyTrashed();
            $data['is_trash'] = true;
        }
        else 
        {
            $data['rows'] = $data['rows']->where(function ($query) use ($request){

                if ($request->has('filter_search') && $request->get('filter_search')) {
                    $query->Where($request->get('filter_search_by'), 'like', '%' . $request->get('filter_search') . '%');
                }
                
                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('mortgage_appraisals.status', $request->get('filter_status'));
                }
                
            });
            $data['is_trash'] = false;
        }
        $data['rows'] = $data['rows']->orderby('mortgage_appraisals.created_at', 'desc')->paginate($data['per_page']);

        $data['request'] = $request->all();
        
        $data['statuses'] = ['all' => 'सबै'] + config('custom.status');
        
        $data['filter_search_by'] = [
            'mortgage_appraisals.id' => 'अनुसन्धान आईडी',
            'applications.subscription_id' => 'सदस्यता नं',
            'applications.borrower_name' => 'ऋण लिने को पुरा नाम',
            'applications.contact_number' => 'सम्पर्क',
        ];


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
        $all_suggestion  =[];
        $rawApplicant  =[];

        $data['rawApplicant'] = Application::select('offices.name_np as name_np','applications.application_id','applications.loan_type', 'applications.borrower_name', 'loan_details.loan_title', 'collateral_details.subscription_id')
        ->withTrashed()->where('applications.application_id', $request->get('applicant_id'))
        ->LeftJoin('loan_details', 'loan_details.application_id','=','applications.application_id')
        ->LeftJoin('collateral_details', 'collateral_details.application_id','=','applications.application_id')
        ->LeftJoin('offices', 'applications.office_id','=','offices.id');
        if(!Auth::user()->hasRole('super-admin'))
        
        $data['rawApplicant'] = $data['rawApplicant']->whereOffice(Auth::user()->office_id)->first();
        else
        $data['rawApplicant'] = $data['rawApplicant']->first();

        // dd($data['rawApplicant']->count());

        $alreadyExists = $this->model->where('application_id', $request->get('applicant_id'))->withTrashed()->first();

        if($alreadyExists)
        {
            return redirect()->route('admin.mortgage_appraisals.edit', ['mortgage_appraisal'=>$alreadyExists->id]);
        }


        if($request->get('applicant_id'))
        {
            if(!$data['rawApplicant'])
                $request->session()->flash('danger_message', 'Invalid Request Data.');
            else
                $request->session()->flash('success_message', 'Request Data fill Successfully.');
        }

        $suggestions_applicants  = Application::select('applications.*', 'collateral_details.subscription_id as subscription_id')
            ->where('loan_type', 'home')
            ->LeftJoin('collateral_details', 'collateral_details.application_id','=','applications.application_id');
        if(!Auth::user()->hasRole('super-admin'))
        {
            $suggestions_applicants = $suggestions_applicants->whereOffice(Auth::user()->office_id);
        }
        $suggestions_applicants = $suggestions_applicants->orderby('applications.borrower_name', 'asc')->get();
        foreach($suggestions_applicants as $suggestions)
        {
            $all_suggestion[$suggestions->application_id] = $suggestions->borrower_name.' / '.$suggestions->borrower_name_en.' ('.$suggestions->id.'- '.config('custom.loan_types.'.$suggestions->loan_type).')';
        }

        $data['applications'] = [null => '-- छान्नुहोस् --']+$all_suggestion ;
        $data['land_units'] = [null => '-- छान्नुहोस् --']+config('custom.land_units');
        $data['applicant_id'] = $request->get('applicant_id') ;

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

        $applicant = Application::where('application_id',$request->get('applicant_id'))->where('loan_type', 'home')->first();

        if(!$applicant)
        {
            $request->session()->flash('danger_message', 'Invalid Application Data.');
            return back();
        }

        $data['application_id']   = $request->get('applicant_id');
        $data['user_id']      = Auth::user()->id;
        $data['office_id']    = $applicant->office_id;
        $data['status']       = 1;
       
        foreach (config('mortgage_appraisals') as $title => $analysis_option) {
            foreach($analysis_option as $key => $field)
                $data [$key] = $request->get($key);
        }
        if($request->get('with_home') != 'on')
        {
            $data['collateral_type'] = 'land';
            $data['no_of_floor'] = 0;
            $data['price_per_floor'] = 0;
            $data['home_cost'] = 0;
            $data['deducted_amount'] = 0;
            $data['home_actual_value'] = 0;
            $data['home_total_value'] = 0;
        }
        else{

            $data['collateral_type'] = 'home_land';
        }

        $mortgage_appraisals = $this->model->create($data);
    
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('create a new dhito mulyankan '.$this->panel .' of <a href="' . route($this->base_route . '.show', $mortgage_appraisals->id) . '">' . $applicant->borrower_name.'</a>', $this->panel, $mortgage_appraisals->id, 'created');
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' saved successfully.');
        return parent::redirectRequest($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);

        $data = [];
        $data['templates'] = [];
        $application_details = [];
        $application_details[]= 'mortgage_appraisals.*';
        $application_details[]= 'other_details.reviewed_by';
        $application_details[]= 'other_details.approved_by';
        foreach(config('fields.applicant_details') as $key=>$field)
        {
            $application_details[]= 'applications.'.$key .' as '.$key;
        }
    
        $data['row'] = $this->model->select($application_details)->withTrashed()->where('mortgage_appraisals.id', $id)
            ->LeftJoin('applications', 'mortgage_appraisals.application_id','=','applications.application_id')
            ->LeftJoin('other_details', 'mortgage_appraisals.application_id','=','other_details.application_id')
            ->LeftJoin('offices', 'mortgage_appraisals.office_id','=','offices.id');
        if(!Auth::user()->hasRole('super-admin'))
        
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id)->first();
        else
            $data['row'] = $data['row']->first();

        $dateConverter = new DateConverter;
        $nepali_today = $dateConverter->get_nepali_date(Carbon::today()->year, Carbon::today()->month, Carbon::today()->day);
        $data['today_string'] = ViewHelper::convertNumberEnToNp($nepali_today['y'].'-'.$nepali_today['m'].'-'.$nepali_today['d']);
            
        $data['activitylogs'] = ActivityLog::where('panel', $this->panel)->where('panel_id', $data['row']->id)->where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data['office'] = Office::where('id',  $data['row']->office_id)->first();

        foreach (config('template.template.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getDriver()->getAdapter();
            $files = $disk->allFiles();

            // make an array of template files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -5) == '.docx' && $disk->exists($f)) {

                    $names = explode('/', $f);
                    $type = $names[1];
                    $fullname = isset($names[2]) ? $names[2] : $names[1];
                    if($names[1] == '10_mortgage_appraisals')
                    {

                        $data['templates'][$type][] = [
                            'file_name'     => str_replace('word-templates/', '', $f),
                            'nick_name'     =>$fullname
                        ];
                    }
                }
            }
        }

        $data['activitylogs'] = ActivityLog::where('panel', $this->panel)->where('panel_id', $data['row']->id)->where('status', 1)->orderBy('created_at', 'desc')->paginate(10);

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
        
        $data['row'] = $this->model->select('mortgage_appraisals.*','offices.name_np as name_np', 'applications.borrower_name', 'loan_details.loan_title', 'collateral_details.subscription_id')->withTrashed()->where('mortgage_appraisals.id', $id)
            ->LeftJoin('applications', 'mortgage_appraisals.application_id','=','applications.application_id')
            ->LeftJoin('loan_details', 'loan_details.application_id','=','mortgage_appraisals.application_id')
            ->LeftJoin('collateral_details', 'collateral_details.application_id','=','mortgage_appraisals.application_id')
        ->LeftJoin('offices', 'applications.office_id','=','offices.id');
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id);
        }
        $data['row'] = $data['row']->first();

        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        $data['requests'] = $request->all();
        $data['land_units'] = [null => '-- छान्नुहोस् --']+config('custom.land_units');

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

        foreach (config('mortgage_appraisals') as $title => $analysis_option) {

            foreach($analysis_option as $key => $field)
                $data [$key] = $request->get($key);
        }
        
        if($request->get('with_home') != 'on')
        {
            $data['collateral_type'] = 'land';
            $data['no_of_floor'] = 0;
            $data['price_per_floor'] = 0;
            $data['home_cost'] = 0;
            $data['deducted_amount'] = 0;
            $data['home_actual_value'] = 0;
            $data['home_total_value'] = 0;
        }
        else{

            $data['collateral_type'] = 'home_land';
        }

        $mortgage_appraisals = $this->model->find($id);
        
        $applicant = Application::select('applications.borrower_name')->where('application_id', $mortgage_appraisals->application_id)->first();
        
        $mortgage_appraisals= $mortgage_appraisals->update($data);
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Update a dhito mulyankan of <strong>'.$applicant->borrower_name .'</strong>', $this->panel, $id, 'updated', $request);
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' updated successfully.');
        return parent::redirectRequest($request);
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
        $data['row'] = $this->model->select('*')->withTrashed()->where('id', $id);
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id);
        }
        $data['row'] = $data['row']->first();

        if (!$this->delete($data['row'])) {
            DB::rollback();
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('delete a '.$this->panel .' <a href="' . route($this->base_route . '.show', $id) . '">' . $data['row']->borrower_name . '</a>', $this->panel, $id, 'deleted');
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

        $data['row'] = $this->model->select('*')->withTrashed()->where('id', $id);
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id);
        }
        $data['row'] = $data['row']->onlyTrashed()->first();


        if (!$data['row']->restore()) {
            DB::rollback();
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('restore a '.$this->panel .' <a href="' . route($this->base_route . '.show', $id) . '">' . $data['row']->borrower_name . '</a>', $this->panel, $id, 'restored');
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
        $data['row'] = $this->model->select('*')->withTrashed()->where('id', $id);
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id);
        }
        $data['row'] = $data['row']->onlyTrashed()->first();


        if (!$data['row']->forceDelete()) {
            DB::rollback();
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('permanently delete a '.$this->panel .' <a href="' . route($this->base_route . '.show', $id) . '">' . $data['row']->borrower_name . '</a>', $this->panel, $id, 'restored');
        DB::commit();
        // ActivityLog::where('panel', 'post')->where('panel_id', $id)->update(['status'=> 0]);

        // ActivityLog::makeActivity('permanently delete a  post  '.$data['row']->title, 'post', $id, 'forceDeleted');

        $request->session()->flash('success_message', $this->panel.' delete permanently.');
        return redirect()->route($this->base_route.'.index');
    }

    protected function delete($row)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);
        if (!$row) {
            return false;
        }
        $row->delete();
        return true;
    }

    

    public function wordExport(Request $request)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        $template = $request->get('template');
        $data = [];
        $id = $request->get('id');
        if($request->get('today'))
            $exportDate = Carbon::parse($request->get('today'));
        else
            $exportDate = Carbon::today();

        $dateConverter = new DateConverter;
        $nepali_today = $dateConverter->get_nepali_date($exportDate->year, $exportDate->month, $exportDate->day);
        $today_string = ViewHelper::convertNumberEnToNp($nepali_today['y'].'-'.$nepali_today['m'].'-'.$nepali_today['d']);
        $to_get = [];
        $to_get[]= 'mortgage_appraisals.*';
        
        foreach(config('fields') as $type=>$fields)
        {
            if($type != 'applicant_details')
            {
                foreach($fields as $key=>$field)
                {
                    $to_get[]= $type.'.'.$key .' as '.$key;
                }
            }
            else
            {
                foreach($fields as $key=>$field)
                {
                    $to_get[]= 'applications.'.$key .' as '.$key;
                }
            }
        } 
        
        $data['row'] = $this->model->select($to_get)->withTrashed()->where('mortgage_appraisals.id', $id)
            ->LeftJoin('applications', 'mortgage_appraisals.application_id','=','applications.application_id')
            ->LeftJoin('offices', 'mortgage_appraisals.office_id','=','offices.id');
        
        foreach(config('fields') as $type=>$fields)
        {
            if($type != 'applicant_details')
            {
                $data['row'] = $data['row']->LeftJoin($type, $type.'.application_id','=','mortgage_appraisals.application_id');      
            }
        } 

        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id);
        }

        $data['row'] = $data['row']->first();

        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data['office'] = Office::where('id',  $data['row']->office_id)->first();
        $name_only='';
        $full_name_array = explode('/', $template);
        $full_name = last($full_name_array);
        $name_only_array = explode('.', $full_name);
        $name_only = $name_only_array['0'];

        $templateProcessor = new TemplateProcessor($template);
        $templateProcessor->setValue('TodayYear', ViewHelper::convertNumberEnToNp($nepali_today['y']));
        $templateProcessor->setValue('TodayMonth', ViewHelper::convertNumberEnToNp($nepali_today['M']));
        $templateProcessor->setValue('TodayDate', ViewHelper::convertNumberEnToNp($nepali_today['d']));
        $templateProcessor->setValue('TodayDayName', ViewHelper::convertNumberEnToNp($nepali_today['l']));
        $templateProcessor->setValue('TodayDayNum', ViewHelper::convertNumberEnToNp($nepali_today['n']));
        $templateProcessor->setValue('TodayFullDate', $today_string);
        foreach(config('fields') as $fields){
            foreach($fields as $key =>$field)
            {
                if($field['required_if'] == false || $field['required_if'] == 'loan_type,'.$data['row']['loan_type'])
                $templateProcessor->setValue($field['template_name'], ViewHelper::docsValueGenerator($data['row'][$key], $field['type'], $field['foreign_key'], 'np', $field['config'] ));
            }
        }
        foreach(config('mortgage_appraisals.fields') as $key=>$field)
        {
            $templateProcessor->setValue($field['template_name'], ViewHelper::docsValueGenerator($data['row'][$key], $field['type'], $field['foreign_key'], 'np', $field['config'] ));
        }
        if($data['office'])
        {
            foreach(config('custom.office_fields') as $key=>$field)
            {
                $templateProcessor->setValue($field['template_name'], ViewHelper::docsValueGenerator($data['office'][$key], $field['type'], $field['foreign_key'], 'np', $field['config'] ));
            }
        }

        $filename = $name_only.'_'.$data['row']->borrower_name;
        $templateProcessor->saveAs($filename.'.doc');
        return response()->download($filename.'.doc')->deleteFileAfterSend(true);

    }
    public function pdfExport(Request $request)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        $template = $request->get('template');
        $id = $request->get('id');
        if($request->get('today'))
            $exportDate = Carbon::parse($request->get('today'));
        else
            $exportDate = Carbon::today();

        $dateConverter = new DateConverter;
        $nepali_today = $dateConverter->get_nepali_date($exportDate->year, $exportDate->month, $exportDate->day);
        $today_string = ViewHelper::convertNumberEnToNp($nepali_today['y'].'-'.$nepali_today['m'].'-'.$nepali_today['d']);
        
        $to_get = [];
        $to_get[]= 'mortgage_appraisals.*';
        foreach(config('fields') as $type=>$fields)
        {
            if($type != 'applicant_details')
            {
                foreach($fields as $key=>$field)
                {
                    $to_get[]= $type.'.'.$key .' as '.$key;
                }
            }
            else
            {
                foreach($fields as $key=>$field)
                {
                    $to_get[]= 'applications.'.$key .' as '.$key;
                }
            }
        } 
        
        $data['row'] = $this->model->select($to_get)->withTrashed()->where('mortgage_appraisals.application_id', $id)
            ->LeftJoin('applications', 'mortgage_appraisals.application_id','=','applications.application_id')
            ->LeftJoin('offices', 'mortgage_appraisals.office_id','=','offices.id');
        
        foreach(config('fields') as $type=>$fields)
        {
            if($type != 'applicant_details')
            {
                $data['row'] = $data['row']->LeftJoin($type, $type.'.application_id','=','mortgage_appraisals.application_id');      
            }
        } 

        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id);
        }
        $data['row'] = $data['row']->first();


        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data['office'] = Office::where('id',  $data['row']->office_id)->first();
        $name_only='';
        $full_name_array = explode('/', $template);
        $full_name = last($full_name_array);
        $name_only_array = explode('.', $full_name);
        $name_only = $name_only_array['0'];


        $analysis_result = '';
        if($data['row']->grand_total >= 70)
        {
            $analysis_result = 'प्राप्त माग आवेदन, पेश गरिएका कागजात एवं ऋण विभागबाट गरिएको अनुसन्धानका आधारमा निज सदस्यलाई उल्लेखित उद्देश्यमा परिचालन गर्ने गरी ऋण लगानीका लागी सिफारिस गरिन्छ ।';
        }
        else
        {
            $analysis_result = 'प्राप्त माग आवेदन, पेश गरिएका कागजात एवं ऋण विभागबाट गरिएको अनुसन्धानका आधारमा निज सदस्यलाई उल्लेखित उद्देश्यमा परिचालन गर्ने गरी ऋण लगानीका लागी उपयुक्त नदेखीएको राय पेश गरिन्छ ।';
        }
        $templateProcessor = new TemplateProcessor($template);
        $templateProcessor->setValue('TodayYear', ViewHelper::convertNumberEnToNp($nepali_today['y']));
        $templateProcessor->setValue('TodayMonth', ViewHelper::convertNumberEnToNp($nepali_today['M']));
        $templateProcessor->setValue('TodayDate', ViewHelper::convertNumberEnToNp($nepali_today['d']));
        $templateProcessor->setValue('TodayDayName', ViewHelper::convertNumberEnToNp($nepali_today['l']));
        $templateProcessor->setValue('TodayDayNum', ViewHelper::convertNumberEnToNp($nepali_today['n']));
        $templateProcessor->setValue('TodayFullDate', $today_string);
        $templateProcessor->setValue('AnalysisObtainMarks', $data['row']->grand_total);
        $templateProcessor->setValue('AnalysisResult', $analysis_result);
        $templateProcessor->setValue('GrandTotal', ViewHelper::convertNumberEnToNp($data['row']['grand_total']));
        foreach(config('fields') as $fields){
            foreach($fields as $key =>$field)
            {
                if($field['required_if'] == false || $field['required_if'] == 'loan_type,'.$data['row']['loan_type'])
                $templateProcessor->setValue($field['template_name'], ViewHelper::docsValueGenerator($data['row'][$key], $field['type'], $field['foreign_key'], 'np', $field['config'] ));
            }
        }
        foreach (config('mortgage_appraisals') as $title => $analysis_option) {

            foreach($analysis_option['fields'] as $key => $field)
                $templateProcessor->setValue($field['template_name'], ViewHelper::docsValueGenerator($data['row'][$key], $field['type'], $field['foreign_key'], 'np', $field['config'] ));
        }
        if($data['office'])
        {
            foreach(config('custom.office_fields') as $key=>$field)
            {
                $templateProcessor->setValue($field['template_name'], ViewHelper::docsValueGenerator($data['office'][$key], $field['type'], $field['foreign_key'], 'np', $field['config'] ));
            }
        }

        $filename = $name_only.'_'.$data['row']->borrower_name;
        $templateProcessor->saveAs($filename.'.docx');

        $reader = IOFactory::createReader('Word2007');
        $wordfile = $reader->load($filename.'.docx');
        $htmlWriter = new WordHTML($wordfile);
        $content = $htmlWriter->getContent();

        if(File::exists(public_path($filename.'.docx'))){
            File::delete(public_path($filename.'.docx'));
        }
        $document = new PDF(['mode'=> 'UTF-8', 'tempDir' => storage_path('app/tmp')]);
        $document->autoScriptToLang = true;
        $document->autoLangToFont = true;
        $document->WriteHTML($content);
        $document->Output();
    }
}
