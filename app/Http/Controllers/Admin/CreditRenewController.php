<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin\Application;
use App\Models\Admin\CreditRenew;

use App\Http\Requests\Admin\CreditRenew\AddFormValidation;
use App\Http\Requests\Admin\CreditRenew\EditFormValidation;
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

class CreditRenewController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.credit_renew';
    protected $view_path = 'admin.credit_renew';
    protected $image_name = null;
    protected $image_dimensions;
    protected $panel = 'Credit Renew';
    protected $folder;
    protected $folder_path;

    public function __construct(CreditRenew $credit_renew)
    {
         $this->model = $credit_renew;
         $this->folder = config('myPath.assets.panel_image_folders.credit_renew');
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
            ->select('offices.name_np as office_name','offices.head_office as head_office','offices.tole as office_tole', 'applications.borrower_name', 'applications.contact_number', 'credit_renews.*', 'other_details.reviewed_by as reviewed_by', 'other_details.approved_by as approved_by')
            ->LeftJoin('applications', 'credit_renews.application_id','=','applications.application_id')
            ->LeftJoin('other_details', 'credit_renews.application_id','=','other_details.application_id')
            ->LeftJoin('offices', 'credit_renews.office_id','=','offices.id');
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
                if (($request->has('filter_date_from') && $request->has('filter_date_to')) && ($request->get('filter_date_from') && $request->get('filter_date_to')) ) 
                    {
                        $from_date = Carbon::parse($request->get('filter_date_from'))->startOFDay();
                        $to_date = Carbon::parse($request->get('filter_date_to'))->endOfDay();
                        $query->whereBetween('credit_renews.renew_decision_date', [$from_date, $to_date]);
                    }
                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('credit_renews.status', $request->get('filter_status'));
                }
                
            });
            $data['is_trash'] = false;
        }
        $data['rows'] = $data['rows']->orderby('credit_renews.created_at', 'desc')->paginate($data['per_page']);
        $data['request'] = $request->all();
        
        $data['statuses'] = ['all' => 'सबै'] + config('custom.status');
        
        $data['filter_search_by'] = [
            'credit_renews.id' => 'नविकरण आईडी',
            'collateral_details.subscription_id' => 'सदस्यता नं',
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

        $data['rawApplicant'] = Application::select('offices.name_np as name_np','applications.application_id', 'applications.borrower_name', 'loan_details.loan_title', 'collateral_details.subscription_id')->withTrashed()->where('applications.application_id', $request->get('applicant_id'))
        ->LeftJoin('loan_details', 'loan_details.application_id','=','applications.application_id')
        ->LeftJoin('collateral_details', 'collateral_details.application_id','=','applications.application_id')
        ->LeftJoin('offices', 'applications.office_id','=','offices.id');

        if(!Auth::user()->hasRole('super-admin'))
        
        $data['rawApplicant'] = $data['rawApplicant']->whereOffice(Auth::user()->office_id)->first();
        else
        $data['rawApplicant'] = $data['rawApplicant']->first();

        if($request->get('applicant_id'))
        {
            if(!$data['rawApplicant'])
                $request->session()->flash('danger_message', 'Invalid Request Data.');
            else
                $request->session()->flash('success_message', 'Request Data fill Successfully.');
        }

        $suggestions_applicants  = Application::select('applications.*', 'collateral_details.subscription_id as subscription_id')
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
        $data['applicant_id'] = $request->get('applicant_id') ;

        $data['payment_types'] = [null => '-- छान्नुहोस् --'] + config('custom.payment_types');
        $data['loan_period_types'] = config('custom.loan_period_types');

        

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
        $applicant = Application::where('application_id', $request->get('applicant_id'))->first();

        $data['application_id']    = $request->get('applicant_id');
        $data['user_id']      = Auth::user()->id;
        $data['office_id']    = $applicant->office_id;
        $data['status']       = 1;


        foreach (config('credit_renew_fields.credit_renews') as $key=>$value) {
            $data [$key] = $request->get($key);
        }
        
        $credit_renew = $this->model->create($data);
    
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Create data for Renew a credit '.$this->panel .' of <a href="' . route($this->base_route . '.show', $credit_renew->id) . '">' . $applicant->borrower_name.'</a>', $this->panel, $credit_renew->id, 'created');
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
        $application_details = [];
        $application_details[]= 'credit_renews.*';
        $application_details[]= 'other_details.reviewed_by';
        $application_details[]= 'other_details.approved_by';
        foreach(config('fields.applicant_details') as $key=>$field)
        {
            $application_details[]= 'applications.'.$key .' as '.$key;
        }
    
        $data['row'] = $this->model->select($application_details)->withTrashed()->where('credit_renews.id', $id)
            ->LeftJoin('applications', 'credit_renews.application_id','=','applications.id')
            ->LeftJoin('other_details', 'credit_renews.application_id','=','other_details.application_id')
            ->LeftJoin('offices', 'credit_renews.office_id','=','offices.id');
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
                    if($names[1] == '9_credit_renews')
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
        $data['row'] = $this->model->select('offices.name_np as name_np', 'applications.borrower_name', 'loan_details.loan_title', 'collateral_details.subscription_id', 'credit_renews.*')
        ->withTrashed()->where('credit_renews.id', $id)
        ->LeftJoin('loan_details', 'credit_renews.application_id','=','loan_details.application_id')
        ->LeftJoin('collateral_details', 'credit_renews.application_id','=','collateral_details.application_id')
        ->LeftJoin('applications', 'credit_renews.application_id','=','applications.application_id')
        ->LeftJoin('offices', 'credit_renews.office_id','=','offices.id');
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id);
        }
        $data['row'] = $data['row']->first();
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data['payment_types'] = [null => '-- छान्नुहोस् --'] + config('custom.payment_types');
        $data['loan_period_types'] = config('custom.loan_period_types');
        $data['requests'] = $request->all();

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

        foreach (config('credit_renew_fields.credit_renews') as $key=>$value) {
            $data [$key] = $request->get($key);
        }
        
        $credit_renew = $this->model->find($id);
        
        $applicant = Application::select('applications.borrower_name')->where('application_id', $credit_renew->application_id)->first();
        
        $credit_renew= $credit_renew->update($data);
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Update a credit renew <strong>'.$applicant->borrower_name .'</strong>', $this->panel, $id, 'updated', $request);
        DB::commit();

        $request->session()->flash('success_message', $this->panel.' Update successfully.');
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
        $to_get[]= 'credit_renews.*';
        
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
        
        $data['row'] = $this->model->select($to_get)->withTrashed()->where('credit_renews.id', $id)
            ->LeftJoin('applications', 'credit_renews.application_id','=','applications.application_id')
            ->LeftJoin('offices', 'credit_renews.office_id','=','offices.id');
        
        foreach(config('fields') as $type=>$fields)
        {
            if($type != 'applicant_details')
            {
                $data['row'] = $data['row']->LeftJoin($type, $type.'.application_id','=','credit_renews.application_id');      
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
        foreach(config('credit_renew_fields.credit_renews') as $key=>$field)
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
        $to_get[]= 'credit_renews.*';
        
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
        
        $data['row'] = $this->model->select($to_get)->withTrashed()->where('credit_renews.id', $id)
            ->LeftJoin('applications', 'credit_renews.application_id','=','applications.application_id')
            ->LeftJoin('offices', 'credit_renews.office_id','=','offices.id');
        
        foreach(config('fields') as $type=>$fields)
        {
            if($type != 'applicant_details')
            {
                $data['row'] = $data['row']->LeftJoin($type, $type.'.application_id','=','credit_renews.application_id');      
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
        foreach(config('credit_renew_fields.credit_renews') as $key=>$field)
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
