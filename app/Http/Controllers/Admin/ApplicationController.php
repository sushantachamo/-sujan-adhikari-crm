<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Admin\Application;
use App\Models\Admin\ApplicationStatus;
use App\Models\Admin\ApplicationFiles;
use App\Models\Admin\CollateralDetails;
use App\Models\Admin\LoanDetails;
use App\Models\Admin\GuarantorDetails;
use App\Models\Admin\SanchiDetails;
use App\Models\Admin\OtherDetails;

use App\Http\Requests\Admin\Application\AddFormValidation;
use App\Http\Requests\Admin\Application\EditFormValidation;
use App\Http\Requests\Admin\Application\ApplicantDetailsRequest;
use App\Http\Requests\Admin\Application\CollateralDetailsRequest;
use App\Http\Requests\Admin\Application\LoanDetailsRequest;
use App\Http\Requests\Admin\Application\GuarantorDetailsRequest;
use App\Http\Requests\Admin\Application\SanchiDetailsRequest;
use App\Http\Requests\Admin\Application\OtherDetailsRequest;
use App\Http\Requests\Admin\Application\ReviewRequest;
use App\Http\Requests\Admin\Application\ChangeStatusRequest;
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

use App\Helpers\Helper as Helper;



use Illuminate\Support\Facades\File;

use Carbon\Carbon;

class ApplicationController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.application';
    protected $view_path = 'admin.application';
    protected $image_name = null;
    protected $image_dimensions;
    protected $panel = 'Application';
    protected $folder;
    protected $folder_path;

    public function __construct(Application $application)
    {
         $this->model = $application;
         $this->folder = config('myPath.assets.panel_image_folders.application');
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
        $data['rows'] = $this->model->select('offices.name_np as office_name','offices.head_office as head_office','offices.tole as office_tole','applications.application_id','applications.id', 'applications.borrower_name', 'applications.contact_number', 'applications.loan_type','loan_details.total_loan_amount', 'applications.latest_status_code', 'applications.created_at as created_at','applications.deleted_at as deleted_at', 'other_details.reviewed_by as reviewed_by', 'other_details.approved_by as approved_by' )
            ->LeftJoin('collateral_details', 'collateral_details.application_id','=','applications.application_id')
            ->LeftJoin('loan_details', 'loan_details.application_id','=','applications.application_id')
            ->LeftJoin('other_details', 'other_details.application_id','=','applications.application_id')
            ->LeftJoin('offices', 'applications.office_id','=','offices.id');

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
                        $query->whereBetween('loan_details.loan_pass_date', [$from_date, $to_date]);
                    }
                if ($request->has('filter_loan_type') && $request->get('filter_loan_type') && $request->get('filter_loan_type') !== 'all') {
                    $query->where('applications.loan_type', $request->get('filter_loan_type'));
                }
                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('applications.status', $request->get('filter_status'));
                }
                
            });
            $data['is_trash'] = false;
        }
        $data['rows'] = $data['rows']->orderby('created_at', 'desc')->paginate($data['per_page']);


        $data['request'] = $request->all();
        
        $data['statuses'] = ['all' => 'सबै'] + config('custom.status');
        
        $data['filter_search_by'] = [
            'applications.id' => 'आईडी',
            'collateral_details.subscription_id' => 'सदस्यता नं',
            'applications.borrower_name' => 'ऋण लिने को पुरा नाम',
            'applications.contact_number' => 'सम्पर्क',
            'loan_details.loan_title' => 'ऋण शिर्षक',
        ];
                            
        $data['loan_types'] = ['all' => 'सबै']+ config('custom.loan_types');

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

        $data['loan_types'] = [null => '-- छान्नुहोस् --'] + config('custom.loan_types');
        $data['genders'] = [null => '-- छान्नुहोस् --'] + config('custom.gender');
        $data['occupations'] = [null => '-- छान्नुहोस् --'] + config('custom.occupations');
        $data['academic_levels'] = [null => '-- छान्नुहोस् --'] + config('custom.academic_levels');

        $data['marital_status'] = [null => '-- छान्नुहोस् --'] + config('custom.marital_status');
        $data['caste_code'] = [null => '-- छान्नुहोस् --'] + config('custom.caste_code');

        $data['relations'] = [null => '-- छान्नुहोस् --'] + config('custom.relations');
        $data['payment_types'] = [null => '-- छान्नुहोस् --'] + config('custom.payment_types');
        $data['loan_period_types'] = config('custom.loan_period_types');
        $data['provinces'] = [null => '-- छान्नुहोस् --'] +Province::select('id', 'name_np')->orderBy('id')->pluck('name_np', 'id')->toArray();
        $data['districts'] = [null => '-- छान्नुहोस् --'] +District::select('id', 'name_np')->orderBy('id')->pluck('name_np', 'id')->toArray();
        $data['requests']['form-name'] = 'applicant_details';


        $data['suggestion_types'] = [null => '-- छान्नुहोस् --'] + config('custom.suggestion_types');

        

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

        generate_application_id:
        $application_id = 'L'.Carbon::parse($request->get('b_dob'))->format('myd').'-'.substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 6)), 0, 6);
        $check_old_application = Application::where('application_id', $application_id)->get();

        if( $check_old_application->first() != null )
        {
            goto  generate_application_id;
        }
        

        $data['application_id']    = $application_id;
        $data['loan_type']    = $request->get('loan_type');
        $data['user_id']      = Auth::user()->id;
        $data['office_id']    = Auth::user()->office_id;
        $data['status']       = 1;

        foreach (config('fields.applicant_details') as $key=>$value) {
            $data [$key] = $request->get($key);
        }
        if($request->get('b_dob'))
            $data['b_age'] = (int)Carbon::parse($request->get('b_dob'))->diff(Carbon::now())->format(('%y'));
        if($request->get('b_son_name'))
            $data['b_son_name'] = implode(', ', $request->get('b_son_name'));
    
        if($request->get('b_daughter_name'))
            $data['b_daughter_name'] = implode(', ', $request->get('b_daughter_name'));
        
        if($request->get('b_same_as_permanent') && $request->get('b_same_as_permanent')=='on')
        {
            $data['b_t_province'] = $request->get('b_p_province');
            $data['b_t_district'] = $request->get('b_p_district');
            $data['b_t_localgovt'] = $request->get('b_p_localgovt');
            $data['b_t_ward'] = $request->get('b_p_ward');
            $data['b_t_tole'] = $request->get('b_p_tole');
        }
        
        $application = $this->model->create($data);
        $empty_data = ['application_id'=> $application->application_id];
        CollateralDetails::create($empty_data);
        LoanDetails::create($empty_data);
        GuarantorDetails::create($empty_data);
        SanchiDetails::create($empty_data);
        OtherDetails::create($empty_data);

        $files = ['citizenship_front'=> $request->file('citizenship_front'), 'citizenship_back'=> $request->file('citizenship_back')];
        $tempFiles = [];
        foreach ($files as $type=>$file) {
            if($file){
                $file_size = $file->getSize();
                $upload_max_filesize_kilobytes = Helper::parse_size(config('custom.filesize'));
                $upload_max_filesize_bytes     = $upload_max_filesize_kilobytes * 1024 ;

                if ($file_size < $upload_max_filesize_bytes && $file_size != 0 && $file->isValid())
                {
                    $allowedDocExtension = config('custom.allowedDocExtension');
                    $extension = $file->getClientOriginalExtension();
                    $check = in_array($extension, $allowedDocExtension);
                    if (!$check)
                    {
                        foreach($tempFiles as $fileToRemove)
                        {
                            $check = Storage::delete('public/documents/'.$application->application_id.'/'.$fileToRemove);
                        }
                        $request->session()->flash('error_message', $extension . '.not allowed. The attachment must be an image.');
                        return redirect()->back()->withInput();
                    }

                    $original_name = explode('.',$file->getClientOriginalName())[0];
                    $original_name = str_split($original_name, 100)[0] ;
                    $filename = time().'_'.$type.'_'.$original_name.'.'.$file->getClientOriginalExtension();

                    $path = $file->storeAs('public/documents/'.$application->application_id, $filename);
                    $tempFiles[$type]=$filename;
                }
                else
                {
                    foreach($tempFiles as $fileToRemove)
                    {
                        $check = Storage::delete('public/documents/'.$application->application_id.'/'.$fileToRemove);
                    }
                    $request->session()->flash('error_message', "File upload failed. The file may not be greater than ".(int)($upload_max_filesize_kilobytes)."KB.");
                    return redirect()->back()->withInput();
                }
            }
            else
            {
                $tempFiles[$type]=null;
            }
        }

        ApplicationFiles::create([
            'application_id'=> $application->application_id,
            'citizenship_front' => $tempFiles['citizenship_front'],
            'citizenship_back' => $tempFiles['citizenship_back']
        ]);

        $latest = ApplicationStatus::create([
            'application_id' => $application_id,
            'status_code'  => 'new',
            'comment' => ' नयाँ ऋण आवेदन ।',
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            ]);

        Application::where('application_id', $application_id)->update([
            'latest_status_id'=> $latest->id,
            'latest_status_code'=> $latest->status_code
        ]);

    
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('create a new loan '.$this->panel .' of <a href="' . route($this->base_route . '.show', $application->application_id) . '">' . $request->get('borrower_name') .'</a>', $this->panel, $application->application_id, 'created');
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' saved successfully.');
        return redirect()->route($this->base_route.'.edit', ['application'=>$application->application_id, 'form-name'=>'applicant_details']);
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

        $select_fields[]='applications.*';
        
        foreach(config('fields') as $type=>$fields)
        {
            if($type != 'applicant_details')
            {
                foreach($fields as $key=>$field)
                {
                    $select_fields[]= $type.'.'.$key .' as '.$key;
                }
            }
        } 
        
        $data['row'] = $this->model->select($select_fields);
        
        foreach(config('fields') as $type=>$fields)
        {
            if($type != 'applicant_details')
            {
                $data['row'] = $data['row']->LeftJoin($type, $type.'.application_id','=','applications.application_id');      
            }
        } 

        $data['row'] = $data['row']->withTrashed()->where('applications.application_id', $id);

        if(!Auth::user()->hasRole('super-admin'))
        
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id)->first();
        else
            $data['row'] = $data['row']->first();
        
        $dateConverter = new DateConverter;
        $nepali_today = $dateConverter->get_nepali_date(Carbon::today()->year, Carbon::today()->month, Carbon::today()->day);
        $data['today_string'] = ViewHelper::convertNumberEnToNp($nepali_today['y'].'-'.$nepali_today['m'].'-'.$nepali_today['d']);
            
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
                    if($names[1] == '2_all' || $names[1] == '1_office_internal' || $names[1] == '6_extra' || $names[1] == '3_'.$data['row']->loan_type || $names[1] == '8_'.$data['row']->loan_type.'_maag_aabedan')
                    {
                        $data['templates'][$type][] = [
                            'file_name'     => str_replace('word-templates/', '', $f),
                            'nick_name'     =>$fullname
                        ];
                    }
                }
            }
        }
        // $collection = collect($data['templates']);

        // $sorted =$collection->sortBy([
        //     ['file_name', 'asc'],
        // ]);
        // $data['templates'] = $sorted ;

        $data['activitylogs'] = ActivityLog::where('panel', $this->panel)->where('panel_id', $data['row']->application_id)->where('status', 1)->orderBy('created_at', 'desc')->paginate(10);

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

        // dd(GuarantorDetails::where('application_id', 'L058406-9A4JW7')->first());

        $data = [];
        $select_fields[]='applications.*';
        $select_fields[]='loan_details.loan_amount';
        $select_fields[]='collateral_details.subscription_id';
        $select_fields[]='guarantor_details.guarantor1_name';
        $select_fields[]='sanchi_details.sanchi1_name';
        $select_fields[]='other_details.tamsuk_writer';
        $select_fields[]='other_details.reviewed_by';
        if($request->get('form-name') == 'review')
        {
            foreach(config('fields') as $type=>$fields)
            {
                if($type != 'applicant_details')
                {
                    foreach($fields as $key=>$field)
                    {
                        $select_fields[]= $type.'.'.$key .' as '.$key;
                    }
                }
            } 
        }
        elseif($request->get('form-name') != 'applicant_details')
        {
            foreach(config('fields.'.$request->get('form-name')) as $key=>$field)
            {
                $select_fields[]= $request->get('form-name').'.'.$key .' as '.$key;
            }
        }

        $select_fields[]='application_files.photo';
        $select_fields[]='application_files.signature';
        $select_fields[]='application_files.citizenship_front';
        $select_fields[]='application_files.citizenship_back';
        $select_fields[]='application_files.lalpurja';
        $select_fields[]='application_files.charkilla';
        $select_fields[]='application_files.tiro_rasid';
        $select_fields[]='application_files.rokka_patra';
        $select_fields[]='application_files.land_lander_citizenship_front';
        $select_fields[]='application_files.land_lander_citizenship_back';
        $select_fields[]='application_files.blue_book';
        $select_fields[]='application_files.route_permit';

        $select_fields[]='application_files.muddati_rasid';
        $select_fields[]='application_files.business_registration_card';
        $select_fields[]='application_files.share_certificate';
        $select_fields[]='application_files.pan_certificate';

        $select_fields[]='application_files.g1_citizenship_front';
        $select_fields[]='application_files.g1_citizenship_back';
        $select_fields[]='application_files.g1_photo';
        $select_fields[]='application_files.g2_citizenship_front';
        $select_fields[]='application_files.g2_citizenship_back';
        $select_fields[]='application_files.g2_photo';
        $select_fields[]='application_files.g3_citizenship_front';
        $select_fields[]='application_files.g3_citizenship_back';
        $select_fields[]='application_files.g3_photo';
        $select_fields[]='application_files.g4_citizenship_front';
        $select_fields[]='application_files.g4_citizenship_back';
        $select_fields[]='application_files.g4_photo';

        $data['row'] = $this->model->select($select_fields);
        
        foreach(config('fields') as $type=>$fields)
        {
            if($type != 'applicant_details')
            {
                $data['row'] = $data['row']->LeftJoin($type, $type.'.application_id','=','applications.application_id');      
            }
        } 
        $data['row'] = $data['row']->LeftJoin('application_files', 'application_files.application_id','=','applications.application_id'); 
        $data['row'] = $data['row']->withTrashed()->where('applications.application_id', $id);

        
        
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->whereOffice(Auth::user()->office_id);
        }
        $data['row'] = $data['row']->first();

        $data['row']['b_dob_bs'] = ViewHelper::convertNumberNpToEn($data['row']->b_dob_bs);
        $data['row']['citizenship_issue_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->citizenship_issue_date_bs);
        $data['row']['loan_apply_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->loan_apply_date_bs);
        $data['row']['subscription_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->subscription_date_bs);
        $data['row']['loan_pass_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->loan_pass_date_bs);
        $data['row']['loan_pass_meeting_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->loan_pass_meeting_date_bs);
        $data['row']['land_lander_dob_bs'] = ViewHelper::convertNumberNpToEn($data['row']->land_lander_dob_bs);
        $data['row']['land_lander_citizenship_issue_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->land_lander_citizenship_issue_date_bs);
        $data['row']['home_blocked_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->home_blocked_date_bs);
        $data['row']['business_register_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->business_register_date_bs);
        $data['row']['periodic_start_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->periodic_start_date_bs);
        $data['row']['periodic_end_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->periodic_end_date_bs);
        $data['row']['guarantor1_dob_bs'] = ViewHelper::convertNumberNpToEn($data['row']->guarantor1_dob_bs);
        $data['row']['guarantor2_dob_bs'] = ViewHelper::convertNumberNpToEn($data['row']->guarantor2_dob_bs);
        $data['row']['guarantor3_dob_bs'] = ViewHelper::convertNumberNpToEn($data['row']->guarantor3_dob_bs);
        $data['row']['guarantor4_dob_bs'] = ViewHelper::convertNumberNpToEn($data['row']->guarantor4_dob_bs);
        $data['row']['g1_citizenship_issue_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->g1_citizenship_issue_date_bs);
        $data['row']['g2_citizenship_issue_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->g2_citizenship_issue_date_bs);
        $data['row']['g3_citizenship_issue_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->g3_citizenship_issue_date_bs);
        $data['row']['g4_citizenship_issue_date_bs'] = ViewHelper::convertNumberNpToEn($data['row']->g4_citizenship_issue_date_bs);

        
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        if($request->get('form-name') == 'loan_details' )
        {
            $select_fields =[];
            $all_laghu_suggestion =[];
            $select_fields[]= 'applications.id';
            $select_fields[]= 'applications.application_id';
            $select_fields[]= 'applications.borrower_name';
            foreach(config('fields.loan_details') as $key=>$field)
            {
                $select_fields[]= 'loan_details.'.$key .' as '.$key;
            }
            
        }

        if($request->get('form-name') == 'collateral_details' )
        {
            $select_fields =[];
            $all_laghu_suggestion =[];
            $select_fields[]= 'applications.id';
            $select_fields[]= 'applications.application_id';
            $select_fields[]= 'applications.borrower_name';
            foreach(config('fields.collateral_details') as $key=>$field)
            {
                $select_fields[]= 'collateral_details.'.$key .' as '.$key;
            }
            if($data['row']->loan_type == 'microfinance')
            {
                $laghu_suggestion_applicants  = $this->model->select($select_fields)
                ->LeftJoin('collateral_details', 'collateral_details.application_id','=','applications.application_id');
                if(!Auth::user()->hasRole('super-admin'))
                {
                    $laghu_suggestion_applicants = $laghu_suggestion_applicants->whereOffice(Auth::user()->office_id);
                }
                $laghu_suggestion_applicants = $laghu_suggestion_applicants->whereNotNull('microfinance_group')->orderby('borrower_name', 'asc')->distinct('microfinance_group_number')->get();
        
                foreach($laghu_suggestion_applicants as $laghu_suggestion)
                {
                    $all_laghu_suggestion[$laghu_suggestion->application_id] = $laghu_suggestion->microfinance_group.'('.$laghu_suggestion->microfinance_group_number.')';
                }
                $data['laghu_suggestions'] = [null => '-- छान्नुहोस् --']+$all_laghu_suggestion ;
                
            }
            if($data['row']->loan_type == 'home')
            {
                if($data['row']->home_kitta_number)
                {
                    $data['row']['home_kitta_numbers'] = explode(', ', $data['row']->home_kitta_number);
                    $data['row']['home_kitta_number'] = explode(', ', $data['row']->home_kitta_number);
                }

                if($data['row']->home_sn_number)
                {
                    $data['row']['home_sn_numbers'] = explode(', ', $data['row']->home_sn_number);
                    $data['row']['home_sn_number'] = explode(', ', $data['row']->home_sn_number);
                }

                if($data['row']->home_area)
                {
                    $data['row']['home_areas'] = explode(', ', $data['row']->home_area);
                    $data['row']['home_area'] = explode(', ', $data['row']->home_area);
                }

                if($data['row']->home_charkilla)
                {
                    $data['row']['home_charkillas'] = explode(', ', $data['row']->home_charkilla);
                    $data['row']['home_charkilla'] = explode(', ', $data['row']->home_charkilla);
                }


            }
            
        }
        
        if($request->get('form-name') != 'review')
        {
            if($data['row']->b_son_name)
            {
                $data['row']['b_son_names'] = explode(', ', $data['row']->b_son_name);
                $data['row']['b_son_name'] = explode(', ', $data['row']->b_son_name);
            }

            
            
            if($data['row']->b_daughter_name)
            {
                $data['row']['b_daughter_names'] = explode(', ', $data['row']->b_daughter_name);
                $data['row']['b_daughter_name'] = explode(', ', $data['row']->b_daughter_name);
            }
        }
        if($data['row'])
        {
            $provinceArray = ['b_p_province'=> 'b_p_district', 'b_t_province'=> 'b_t_district', 'home_province'=> 'home_district', 'g1_p_province'=> 'g1_p_district', 'g1_t_province'=> 'g1_t_district','g2_p_province'=> 'g2_p_district', 'g2_t_province'=> 'g2_t_district','g3_p_province'=> 'g3_p_district', 'g3_t_province'=> 'g3_t_district','g4_p_province'=> 'g4_p_district', 'g4_t_province'=> 'g4_t_district','anshiyar1_province'=> 'anshiyar1_district','anshiyar2_province'=> 'anshiyar2_district','sanchi1_province'=> 'sanchi1_district', 'sanchi2_province'=> 'sanchi2_district', 'land_lander_p_province'=>'land_lander_p_district', 'land_lander_t_province'=>'land_lander_t_district' ];
            $districtsArray =['b_p_district'=> 'b_p_localgovt', 'b_t_district'=> 'b_t_localgovt', 'g1_p_district'=> 'g1_p_localgovt', 'g1_t_district'=> 'g1_t_localgovt', 'g2_p_district'=> 'g2_p_localgovt', 'g2_t_district'=> 'g2_t_localgovt', 'g3_p_district'=> 'g3_p_localgovt', 'g3_t_district'=> 'g3_t_localgovt', 'g4_p_district'=> 'g4_p_localgovt', 'g4_t_district'=> 'g4_t_localgovt','anshiyar1_district'=> 'anshiyar1_localgovt','anshiyar2_district'=> 'anshiyar2_localgovt','sanchi1_district'=> 'sanchi1_localgovt', 'sanchi2_district'=> 'sanchi2_localgovt', 'land_lander_p_district'=> 'land_lander_p_localgovt', 'land_lander_t_district'=> 'land_lander_t_localgovt' ];
            foreach($provinceArray as $province => $district)
            {
                $province_id = '';
                if($request->old($province))
                {
                    $province_id = $request->old($province);
                }
                else
                {
                    $province_id = $data['row'][$province];
                }

                if($province_id)
                $data[$district.'s'] = [null => '-- छान्नुहोस् --'] +District::select('id', 'name_np')->where('province_id', $province_id)->orderBy('id')->pluck('name_np', 'id')->toArray();

            }
            foreach($districtsArray as $district=>$local_govt)
            {

                $district_id = '';
                if($request->old($district))
                {
                    $district_id = $request->old($district);
                }
                else
                {
                    $district_id = $data['row'][$district];
                }

                if($district_id)
                    $data[$local_govt.'s'] = [null => '-- छान्नुहोस् --'] +LocalGovt::select('id', 'name_np')->where('district_id', $district_id)->orderBy('id')->pluck('name_np', 'id')->toArray();

            }
        }

        $data['genders'] = [null => '-- छान्नुहोस् --'] + config('custom.gender');
        $data['occupations'] = [null => '-- छान्नुहोस् --'] + config('custom.occupations');
        $data['relations'] = [null => '-- छान्नुहोस् --'] + config('custom.relations');
        $data['academic_levels'] = [null => '-- छान्नुहोस् --'] + config('custom.academic_levels');
        $data['marital_status'] = [null => '-- छान्नुहोस् --'] + config('custom.marital_status');
        $data['caste_code'] = [null => '-- छान्नुहोस् --'] + config('custom.caste_code');
        $data['payment_types'] = [null => '-- छान्नुहोस् --'] + config('custom.payment_types');
        $data['suggestion_types'] = [null => '-- छान्नुहोस् --'] + config('custom.suggestion_types');
        $data['loan_period_types'] = config('custom.loan_period_types');
        $data['provinces'] = [null => '-- छान्नुहोस् --'] +Province::select('id', 'name_np')->orderBy('id')->pluck('name_np', 'id')->toArray();
        $data['districts'] = [null => '-- छान्नुहोस् --'] +District::select('id', 'name_np')->orderBy('id')->pluck('name_np', 'id')->toArray();
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
       dd('invalid_request');
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
        $data['row'] = $this->model->select('*')->withTrashed()->where('application_id', $id);
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

        $data['row'] = $this->model->select('*')->withTrashed()->where('application_id', $id);
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
        $data['row'] = $this->model->select('*')->withTrashed()->where('application_id', $id);
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

        LoanDetails::where('application_id', $data['row']->application_id)->delete();
        GuarantorDetails::where('application_id', $data['row']->application_id)->delete();
        SanchiDetails::where('application_id', $data['row']->application_id)->delete();
        OtherDetails::where('application_id', $data['row']->application_id)->delete();
        

        ApplicationFiles::where('application_id', $data['row']->application_id)->delete();
        
        Storage::deleteDirectory('public/documents/'.$data['row']->application_id);



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

    public function loadDistrictHtml(Request $request)
    {
        $response = [];
        $response['html'] = '';
        if ($request->get('province_id') == 'select') {

            return response()->json($response);

        } elseif ($request->get('province_id')) {

            $districts = District::select('id', 'name_np')->where('province_id', $request->get('province_id'))
                ->orderBy('name_np')->get();
            if ($districts) {
                $response = [];
                $response['html'] = view('address.district_row', [
                    'districts' => $districts
                ])->render();

                return response()->json($response);
            }

        }

        return response('Invalid request', 401);
    }

    public function loadLocalGovHtml(Request $request)
    {
        $response = [];
        $response['html'] = '';
        if ($request->get('district_id') == 'select') {

            return response()->json($response);

        } elseif ($request->get('district_id')) {

            $local_gov = LocalGovt::select('id', 'name_np')->where('district_id', $request->get('district_id'))
                ->orderBy('name_np')->get();

            if ($local_gov) {
                $response = [];
                $response['html'] = view('address.local_gov_row', [
                    'local_gov' => $local_gov
                ])->render();

                return response()->json($response);
            }

        }

        return response('Invalid request', 401);
    }

    public function submitApplicantDetails (ApplicantDetailsRequest $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 

        foreach (config('fields.applicant_details') as $key=>$value) {
            $data [$key] = $request->get($key);
        }
        if($request->get('b_dob'))
            $data['b_age'] = (int)Carbon::parse($request->get('b_dob'))->diff(Carbon::now())->format(('%y'));
        if($request->get('b_son_name'))
            $data['b_son_name'] = implode(', ', $request->get('b_son_name'));
    
        if($request->get('b_daughter_name'))
            $data['b_daughter_name'] = implode(', ', $request->get('b_daughter_name'));
        
        if($request->get('b_same_as_permanent') && $request->get('b_same_as_permanent')=='on')
        {
            $data['b_t_province'] = $request->get('b_p_province');
            $data['b_t_district'] = $request->get('b_p_district');
            $data['b_t_localgovt'] = $request->get('b_p_localgovt');
            $data['b_t_ward'] = $request->get('b_p_ward');
            $data['b_t_tole'] = $request->get('b_p_tole');
        }
        
        $application = $this->model->where('application_id', $request->get('id'))->first();
        $update = $application->update($data);

        $old_files = ApplicationFiles::where('application_id', $request->get('id'))->first();
        $files = ['citizenship_front'=> $request->file('citizenship_front'), 'citizenship_back'=> $request->file('citizenship_back')];
        $tempFiles = $this->uploadFiles($request, $application, $files, $old_files);
        if(isset($tempFiles['error']) && $tempFiles['error']!=null)
        {
            DB::rollback();
            $request->session()->flash('success_message', $tempFiles['error']);
            return redirect()->back();
        }
        

        ApplicationFiles::where('application_id', $request->get('id'))->update([
            'citizenship_front' => $tempFiles['citizenship_front'],
            'citizenship_back' => $tempFiles['citizenship_back']
        ]);

        $latest = ApplicationStatus::create([
            'application_id' => $request->get('id'),
            'status_code'  => 'edited',
            'comment' => 'आबेदकको विवरण परिवर्तन भएको छ।',
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            ]);

        Application::where('application_id', $request->get('id'))->update([
            'latest_status_id'=> $latest->id,
            'latest_status_code'=> $latest->status_code
        ]);

        OtherDetails::where('application_id', $request->get('id'))->update([
            'reviewed_by' => NULL,
            'approved_by' => NULL,
        ]);

    
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('change a  '.$this->panel .' applicant details  of <a href="' . route($this->base_route . '.show', $request->get('id')) . '">' . $request->get('borrower_name') .'</a>', $this->panel, $request->get('id'), 'updated');
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' applicant details saved successfully.');
        return redirect()->back();  
    }
    public function submitCollateralDetails (CollateralDetailsRequest $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 
        $pre_data = $this->model->where('application_id', $request->get('id'))->first();

        foreach (config('fields.collateral_details') as $key=>$value) {
            $data [$key] = $request->get($key);
        }
        if($request->get('home_kitta_number'))
            $data['home_kitta_number'] = implode(', ', $request->get('home_kitta_number'));
        if($request->get('home_sn_number'))
            $data['home_sn_number'] = implode(', ', $request->get('home_sn_number'));
        if($request->get('home_area'))
            $data['home_area'] = implode(', ', $request->get('home_area'));
        if($request->get('home_charkilla'))
            $data['home_charkilla'] = implode(', ', $request->get('home_charkilla'));




        if($request->get('land_lander_same_as_borrower') && $request->get('land_lander_same_as_borrower')=='on')
        {
            $data['land_lander_name'] = $pre_data['borrower_name'];
            $data['land_lander_name_en'] = $pre_data['borrower_name_en'];
            $data['land_lander_father_name'] = $pre_data['b_father_name'];
            $data['land_lander_grand_father_name'] = $pre_data['b_grand_father_name'];
            $data['land_lander_spouse_name'] = $pre_data['b_spouse_name'];
            $data['land_lander_dob'] = $pre_data['b_dob'];
            $data['land_lander_dob_bs'] = $pre_data['b_dob_bs'];
            $data['land_lander_age'] = $pre_data['b_age'];
            $data['land_lander_relation'] = 'self';
            $data['land_lander_contact_number'] = $pre_data['contact_number'];
            $data['land_lander_citizenship_number'] = $pre_data['citizenship_number'];
            $data['land_lander_citizenship_issue_date'] = $pre_data['citizenship_issue_date'];
            $data['land_lander_citizenship_issue_date_bs'] = $pre_data['citizenship_issue_date_bs'];
            $data['land_lander_citizenship_issue_district'] = $pre_data['citizenship_issue_district'];
            $data['land_lander_former_address'] = $pre_data['citizenship_former_address'];
            $data['land_lander_p_province'] = $pre_data['b_p_province'];
            $data['land_lander_p_district'] = $pre_data['b_p_district'];
            $data['land_lander_p_localgovt'] = $pre_data['b_p_localgovt'];
            $data['land_lander_p_ward'] = $pre_data['b_p_ward'];
            $data['land_lander_p_tole'] = $pre_data['b_p_tole'];
            $data['land_lander_t_province'] = $pre_data['b_t_province'];
            $data['land_lander_t_district'] = $pre_data['b_t_district'];
            $data['land_lander_t_localgovt'] = $pre_data['b_t_localgovt'];
            $data['land_lander_t_ward'] = $pre_data['b_t_ward'];
            $data['land_lander_t_tole'] = $pre_data['b_t_tole'];
        }
        else
        {
            if($request->get('land_lander_dob'))
                $data['land_lander_age'] = (int)Carbon::parse($request->get('land_lander_dob'))->diff(Carbon::now())->format(('%y'));
            
            if($request->get('land_lander_same_as_permanent') && $request->get('land_lander_same_as_permanent') == 'on')
            {
                $data['land_lander_t_province'] = $request->get('land_lander_p_province');
                $data['land_lander_t_district'] = $request->get('land_lander_p_district');
                $data['land_lander_t_localgovt'] = $request->get('land_lander_p_localgovt');
                $data['land_lander_t_ward'] = $request->get('land_lander_p_ward');
                $data['land_lander_t_tole'] = $request->get('land_lander_p_tole');
            }
        }
        
        $application = CollateralDetails::where('application_id', $request->get('id'))->first();
        if(!$application)
        {
            $data['application_id'] = $request->get('id');
            $application = CollateralDetails::create($data); 
        }
        else
        {
            $update = $application->update($data);
        }

        $old_files = ApplicationFiles::where('application_id', $request->get('id'))->first();

        $files = [
            'lalpurja'=> $request->file('lalpurja'),
            'charkilla'=> $request->file('charkilla'),
            'tiro_rasid'=> $request->file('tiro_rasid'),
            'rokka_patra'=> $request->file('rokka_patra'),
            'land_lander_citizenship_front'=> $request->file('land_lander_citizenship_front'),
            'land_lander_citizenship_back'=> $request->file('land_lander_citizenship_back'),

            'blue_book'=> $request->file('blue_book'),
            'route_permit'=> $request->file('route_permit'),

            'muddati_rasid'=> $request->file('muddati_rasid'),
            'business_registration_card'=> $request->file('business_registration_card'),
            'share_certificate'=> $request->file('share_certificate'),
            'pan_certificate'=> $request->file('pan_certificate'),
        ];
        $tempFiles = $this->uploadFiles($request, $application, $files, $old_files);
        if(isset($tempFiles['error']) && $tempFiles['error']!=null)
        {
            DB::rollback();
            $request->session()->flash('success_message', $tempFiles['error']);
            return redirect()->back();
        }
        ApplicationFiles::where('application_id', $request->get('id'))->update([
            'lalpurja'=> $tempFiles['lalpurja'],
            'charkilla'=> $tempFiles['charkilla'],
            'tiro_rasid'=> $tempFiles['tiro_rasid'],
            'rokka_patra'=> $tempFiles['rokka_patra'],
            'land_lander_citizenship_front' => $tempFiles['land_lander_citizenship_front'],
            'land_lander_citizenship_back' => $tempFiles['land_lander_citizenship_back'],

            'blue_book'=> $tempFiles['blue_book'],
            'route_permit'=> $tempFiles['route_permit'],

            'muddati_rasid'=> $tempFiles['muddati_rasid'],
            'business_registration_card'=> $tempFiles['business_registration_card'],
            'share_certificate'=> $tempFiles['share_certificate'],
            'pan_certificate'=> $tempFiles['pan_certificate'],

        ]);

        $latest = ApplicationStatus::create([
            'application_id' => $request->get('id'),
            'status_code'  => 'edited',
            'comment' => 'धितो विवरण परिवर्तन भएको छ।',
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            ]);

        Application::where('application_id', $request->get('id'))->update([
            'latest_status_id'=> $latest->id,
            'latest_status_code'=> $latest->status_code
        ]);

        OtherDetails::where('application_id', $request->get('id'))->update([
            'reviewed_by' => NULL,
            'approved_by' => NULL,
        ]);
    
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Save '.$this->panel .'Loan Details of <a href="' . route($this->base_route . '.show', $request->get('id')) . '">' . $request->get('borrower_name') .'</a>', $this->panel, $request->get('id'), 'updated');
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' collateral details saved successfully.');
        return redirect()->back();
    }
    public function submitLoanDetails (LoanDetailsRequest $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 
        $pre_data = $this->model->where('application_id', $request->get('id'))->first();

        foreach (config('fields.loan_details') as $key=>$value) {
            $data [$key] = $request->get($key);
        }
        
        $application = LoanDetails::where('application_id', $request->get('id'))->first();
        $update = $application->update($data);


        $latest = ApplicationStatus::create([
            'application_id' => $request->get('id'),
            'status_code'  => 'edited',
            'comment' => 'ऋण विवरण परिवर्तन भएको छ।',
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            ]);

        Application::where('application_id', $request->get('id'))->update([
            'latest_status_id'=> $latest->id,
            'latest_status_code'=> $latest->status_code
        ]);

        OtherDetails::where('application_id', $request->get('id'))->update([
            'reviewed_by' => NULL,
            'approved_by' => NULL,
        ]);


    
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Save '.$this->panel .'Loan Details of <a href="' . route($this->base_route . '.show', $request->get('id')) . '">' . $request->get('borrower_name') .'</a>', $this->panel, $request->get('id'), 'updated');
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' loan details saved successfully.');
        return redirect()->back();
    }
    public function submitGuarantorDetails (GuarantorDetailsRequest $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 

        foreach (config('fields.guarantor_details') as $key=>$value) {
            $data [$key] = $request->get($key);
        }
        if($request->get('guarantor1_dob'))
            $data['guarantor1_age'] = (int)Carbon::parse($request->get('guarantor1_dob'))->diff(Carbon::now())->format(('%y'));
        if($request->get('guarantor2_dob'))
            $data['guarantor2_age'] = (int)Carbon::parse($request->get('guarantor2_dob'))->diff(Carbon::now())->format(('%y'));
        
        if($request->get('guarantor3_dob'))
            $data['guarantor3_age'] = (int)Carbon::parse($request->get('guarantor3_dob'))->diff(Carbon::now())->format(('%y'));
        
        if($request->get('guarantor4_dob'))
            $data['guarantor4_age'] = (int)Carbon::parse($request->get('guarantor4_dob'))->diff(Carbon::now())->format(('%y'));
            
        
        if($request->get('g1_same_as_permanent') && $request->get('g1_same_as_permanent')=='on')
        {
            $data['g1_t_province'] = $request->get('g1_p_province');
            $data['g1_t_district'] = $request->get('g1_p_district');
            $data['g1_t_localgovt'] = $request->get('g1_p_localgovt');
            $data['g1_t_ward'] = $request->get('g1_p_ward');
            $data['g1_t_tole'] = $request->get('g1_p_tole');
        }
        if($request->get('g2_same_as_permanent') && $request->get('g2_same_as_permanent')=='on')
        {
            $data['g2_t_province'] = $request->get('g2_p_province');
            $data['g2_t_district'] = $request->get('g2_p_district');
            $data['g2_t_localgovt'] = $request->get('g2_p_localgovt');
            $data['g2_t_ward'] = $request->get('g2_p_ward');
            $data['g2_t_tole'] = $request->get('g2_p_tole');
        }
        if($request->get('g3_same_as_permanent') && $request->get('g3_same_as_permanent')=='on')
        {
            $data['g3_t_province'] = $request->get('g3_p_province');
            $data['g3_t_district'] = $request->get('g3_p_district');
            $data['g3_t_localgovt'] = $request->get('g3_p_localgovt');
            $data['g3_t_ward'] = $request->get('g3_p_ward');
            $data['g3_t_tole'] = $request->get('g3_p_tole');
        }
        if($request->get('g4_same_as_permanent') && $request->get('g4_same_as_permanent')=='on')
        {
            $data['g4_t_province'] = $request->get('g4_p_province');
            $data['g4_t_district'] = $request->get('g4_p_district');
            $data['g4_t_localgovt'] = $request->get('g4_p_localgovt');
            $data['g4_t_ward'] = $request->get('g4_p_ward');
            $data['g4_t_tole'] = $request->get('g4_p_tole');
        }
        
        $application = GuarantorDetails::where('application_id', $request->get('id'))->first();
        $update = $application->update($data);

        $old_files = ApplicationFiles::where('application_id', $request->get('id'))->first();

        $files = [
            'g1_citizenship_front'=> $request->file('g1_citizenship_front'),
            'g1_citizenship_back'=> $request->file('g1_citizenship_back'),
            'g1_photo'=> $request->file('g1_photo'),

            'g2_citizenship_front'=> $request->file('g2_citizenship_front'),
            'g2_citizenship_back'=> $request->file('g2_citizenship_back'),
            'g2_photo'=> $request->file('g2_photo'),

            'g3_citizenship_front'=> $request->file('g3_citizenship_front'),
            'g3_citizenship_back'=> $request->file('g3_citizenship_back'),
            'g3_photo'=> $request->file('g3_photo'),

            'g4_citizenship_front'=> $request->file('g4_citizenship_front'),
            'g4_citizenship_back'=> $request->file('g4_citizenship_back'),
            'g4_photo'=> $request->file('g4_photo'),    
        ];
        $tempFiles = $this->uploadFiles($request, $application, $files, $old_files);
        if(isset($tempFiles['error']) && $tempFiles['error']!=null)
        {
            DB::rollback();
            $request->session()->flash('success_message', $tempFiles['error']);
            return redirect()->back();
        }
        ApplicationFiles::where('application_id', $request->get('id'))->update([
            'g1_citizenship_front'=> $tempFiles['g1_citizenship_front'],
            'g1_citizenship_back'=> $tempFiles['g1_citizenship_back'],
            'g1_photo'=> $tempFiles['g1_photo'],

            'g2_citizenship_front'=> $tempFiles['g2_citizenship_front'],
            'g2_citizenship_back'=> $tempFiles['g2_citizenship_back'],
            'g2_photo'=> $tempFiles['g2_photo'],

            'g3_citizenship_front'=> $tempFiles['g3_citizenship_front'],
            'g3_citizenship_back'=> $tempFiles['g3_citizenship_back'],
            'g3_photo'=> $tempFiles['g3_photo'],

            'g4_citizenship_front'=> $tempFiles['g4_citizenship_front'],
            'g4_citizenship_back'=> $tempFiles['g4_citizenship_back'],
            'g4_photo'=> $tempFiles['g4_photo'],
        ]);
        $latest = ApplicationStatus::create([
            'application_id' => $request->get('id'),
            'status_code'  => 'edited',
            'comment' => 'धनजमानी विवरण परिवर्तन भएको छ।',
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            ]);

        Application::where('application_id', $request->get('id'))->update([
            'latest_status_id'=> $latest->id,
            'latest_status_code'=> $latest->status_code
        ]);
        
        OtherDetails::where('application_id', $request->get('id'))->update([
            'reviewed_by' => NULL,
            'approved_by' => NULL,
        ]);
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Save '.$this->panel .'Guarantor Details of <a href="' . route($this->base_route . '.show', $request->get('id')) . '">' . $request->get('borrower_name') .'</a>', $this->panel, $request->get('id'), 'updated');
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' guarantor details saved successfully.');
        return redirect()->back();  
    }
    public function submitSanchiDetails (SanchiDetailsRequest $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 

        foreach (config('fields.sanchi_details') as $key=>$value) {
            $data [$key] = $request->get($key);
        }
        
        $application = SanchiDetails::where('application_id', $request->get('id'))->update($data);
        
        $latest = ApplicationStatus::create([
            'application_id' => $request->get('id'),
            'status_code'  => 'edited',
            'comment' => 'साक्षी विवरण परिवर्तन भएको छ।',
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            ]);

        Application::where('application_id', $request->get('id'))->update([
            'latest_status_id'=> $latest->id,
            'latest_status_code'=> $latest->status_code
        ]);

        OtherDetails::where('application_id', $request->get('id'))->update([
            'reviewed_by' => NULL,
            'approved_by' => NULL,
        ]);
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Save '.$this->panel .' Sachi Details of <a href="' . route($this->base_route . '.show', $request->get('id')) . '">' . $request->get('borrower_name') .'</a>', $this->panel, $request->get('id'), 'updated');
        
            
        DB::commit();
        $request->session()->flash('success_message', $this->panel . ' sachi details saved successfully.');
        return redirect()->back();   
    }
    public function submitOtherDetails (OtherDetailsRequest $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 

        foreach (config('fields.other_details') as $key=>$value) {
            if($key != 'reviewed_by')
                $data [$key] = $request->get($key);
        }
        $application = OtherDetails::where('application_id', $request->get('id'))->first();
        $update = $application->update($data);

        $old_files = ApplicationFiles::where('application_id', $request->get('id'))->first();

        $files = [
            'photo'=> $request->file('photo'),
            'signature'=> $request->file('signature'),
        ];
        $tempFiles = $this->uploadFiles($request, $application, $files, $old_files);
        if(isset($tempFiles['error']) && $tempFiles['error']!=null)
        {
            DB::rollback();
            $request->session()->flash('success_message', $tempFiles['error']);
            return redirect()->back();
        }
        ApplicationFiles::where('application_id', $request->get('id'))->update([
            'photo'=> $tempFiles['photo'],
            'signature'=> $tempFiles['signature'],
        ]);

        $latest = ApplicationStatus::create([
            'application_id' => $request->get('id'),
            'status_code'  => 'edited',
            'comment' => 'आवेदनको अन्य विवरण परिवर्तन भएको छ।',
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            ]);

        Application::where('application_id', $request->get('id'))->update([
            'latest_status_id'=> $latest->id,
            'latest_status_code'=> $latest->status_code
        ]);

        OtherDetails::where('application_id', $request->get('id'))->update([
            'reviewed_by' => NULL,
            'approved_by' => NULL,
        ]);
    
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Save '.$this->panel .' Other Details of <a href="' . route($this->base_route . '.show', $request->get('id')) . '">' . $request->get('borrower_name') .'</a>', $this->panel, $request->get('id'), 'updated');
        DB::commit();

        $request->session()->flash('success_message', $this->panel . ' other details saved successfully.');
        return redirect()->back();   
    }

    public function loadSuggestionsHtml(Request $request)
    {
        $response = [];
        $response['html'] = '';
        if ($request->get('suggestion_type') == 'select') {

            return response()->json($response);

        } 
        elseif ($request->get('suggestion_type') == 'applicant') 
        {

            $all_suggestion = $this->getSuggestionList('applicant');

            if ($all_suggestion) {
                $response = [];
                $response['html'] = view('address.suggestion_row', [
                    'all_suggestion' => $all_suggestion
                ])->render();

                return response()->json($response);
            }

        }
        elseif ($request->get('suggestion_type') == 'guarantor') 
        {

            $all_suggestion = $this->getSuggestionList('guarantor');

            if ($all_suggestion) {
                $response = [];
                $response['html'] = view('address.suggestion_row', [
                    'all_suggestion' => $all_suggestion
                ])->render();

                return response()->json($response);
            }

        }
        elseif ($request->get('suggestion_type') == 'land_lander') 
        {
            $all_suggestion = $this->getSuggestionList('land_lander');

            if ($all_suggestion) {
                $response = [];
                $response['html'] = view('address.suggestion_row', [
                    'all_suggestion' => $all_suggestion
                ])->render();

                return response()->json($response);
            }

        }

        return response('Invalid request', 401);
    }
    public function getSuggestionList($suggestion_type)
    {
        if ($suggestion_type == 'applicant') 
        {
            $suggestions_applicants  = $this->model->select('applications.*', 'collateral_details.subscription_id as subscription_id')
            ->LeftJoin('collateral_details', 'collateral_details.application_id','=','applications.application_id');
            if(!Auth::user()->hasRole('super-admin'))
            {
                $suggestions_applicants = $suggestions_applicants->whereOffice(Auth::user()->office_id);
            }
            $suggestions_applicants = $suggestions_applicants->orderby('borrower_name', 'asc')->get();
            foreach($suggestions_applicants as $suggestions)
            {
                $all_suggestion[$suggestions->application_id] = $suggestions->borrower_name.' / '.$suggestions->borrower_name_en.' ('.$suggestions->subscription_id.')';
            }

            return $all_suggestion;

        }
        elseif ($suggestion_type == 'guarantor') 
        {
            $suggestions_applicants_g1  = GuarantorDetails::select('guarantor_details.*')->whereNotNull('guarantor1_name');
            if(!Auth::user()->hasRole('super-admin'))
            {
                $suggestions_applicants_g1 = $suggestions_applicants_g1->whereOffice(Auth::user()->office_id);
            }
            $suggestions_applicants_g1 = $suggestions_applicants_g1->distinct('guarantor1_name','guarantor1_subscription_id')->get();
            foreach($suggestions_applicants_g1 as $suggestions)
            {
                if($suggestions->guarantor1_name)
                    $all_suggestion['G1_'.$suggestions->application_id] = $suggestions->guarantor1_name.'('.ViewHelper::convertNumberNpToEn($suggestions->guarantor1_subscription_id).')';
            
            }

            $suggestions_applicants_g2  = GuarantorDetails::select('guarantor_details.*')->whereNotNull('guarantor2_name');
            if(!Auth::user()->hasRole('super-admin'))
            {
                $suggestions_applicants_g2 = $suggestions_applicants_g2->whereOffice(Auth::user()->office_id);
            }
            $suggestions_applicants_g2 = $suggestions_applicants_g2->distinct('guarantor2_name','guarantor2_subscription_id')->get();
            foreach($suggestions_applicants_g2 as $suggestions)
            {
                if($suggestions->guarantor2_name)
                    $all_suggestion['G2_'.$suggestions->application_id] = $suggestions->guarantor2_name.'('.ViewHelper::convertNumberNpToEn($suggestions->guarantor2_subscription_id).')';
            
            }

            $suggestions_applicants_g3  = GuarantorDetails::select('guarantor_details.*')->whereNotNull('guarantor3_name');
            if(!Auth::user()->hasRole('super-admin'))
            {
                $suggestions_applicants_g3 = $suggestions_applicants_g3->whereOffice(Auth::user()->office_id);
            }
            $suggestions_applicants_g3 = $suggestions_applicants_g3->distinct('guarantor3_name','guarantor3_subscription_id')->get();
            foreach($suggestions_applicants_g3 as $suggestions)
            {
                if($suggestions->guarantor3_name)
                    $all_suggestion['G3_'.$suggestions->application_id] = $suggestions->guarantor3_name.'('.ViewHelper::convertNumberNpToEn($suggestions->guarantor3_subscription_id).')';
            
            }
            $suggestions_applicants_g4  = GuarantorDetails::select('guarantor_details.*')->whereNotNull('guarantor4_name');
            if(!Auth::user()->hasRole('super-admin'))
            {
                $suggestions_applicants_g4 = $suggestions_applicants_g4->whereOffice(Auth::user()->office_id);
            }
            $suggestions_applicants_g4 = $suggestions_applicants_g4->distinct('guarantor4_name','guarantor4_subscription_id')->get();
            foreach($suggestions_applicants_g4 as $suggestions)
            {
                if($suggestions->guarantor4_name)
                    $all_suggestion['G4_'.$suggestions->application_id] = $suggestions->guarantor4_name.'('.ViewHelper::convertNumberNpToEn($suggestions->guarantor4_subscription_id).')';
            
            }

            return $all_suggestion;
        }
        elseif ($suggestion_type == 'land_lander') 
        {
            $suggestions_applicants  = LoanDetails::select('collateral_details.*')->whereNotNull('land_lander_name');;
            if(!Auth::user()->hasRole('super-admin'))
            { 
                $suggestions_applicants = $suggestions_applicants->whereOffice(Auth::user()->office_id);
            }
            $suggestions_applicants = $suggestions_applicants->distinct('land_lander_name','land_lander_citizenship_number')->get();
            foreach($suggestions_applicants as $suggestions)
            {
                $all_suggestion[$suggestions->application_id] = $suggestions->land_lander_name.' / '.$suggestions->land_lander_name_en;
            }
            return $all_suggestion;
        }
    }

    public function applicantFill(Request $request)
    {
        $suggestion_type = $request->get('suggestion_type');
        $suggestion_id = $request->get('suggestion_id');

        $fillContainer =[];
        if($suggestion_id)
        {
            if($suggestion_type == 'applicant')
            {
                $rawData = $this->model->select('applications.borrower_name as name', 'applications.borrower_name_en as name_en', 'applications.borrower_gender as gender', 'applications.b_father_name as father_name', 'applications.b_grand_father_name as grand_father_name','applications.b_mother_name as mother_name', 'applications.b_spouse_name as spouse_name', 'applications.b_son_name as sons', 'applications.b_daughter_name as daughters', 'applications.b_dob as dob', 'applications.b_dob_bs as dob_bs', 'applications.contact_number as contact_number', 'applications.b_edu_qualification as edu_qualification', 'applications.b_occupation as occupation', 'applications.b_occupation_location as occupation_location', 'applications.citizenship_former_address as former_address', 'applications.b_p_province as p_province', 'applications.b_p_district as p_district', 'applications.b_p_localgovt as p_localgovt', 'applications.b_p_ward as p_ward', 'applications.b_p_tole as p_tole', 'applications.b_t_province as t_province', 'applications.b_t_district as t_district', 'applications.b_t_localgovt as t_localgovt', 'applications.b_t_ward as t_ward', 'applications.b_t_tole as t_tole', 'applications.citizenship_number as citizenship_number', 'applications.citizenship_issue_date as citizenship_issue_date', 'applications.citizenship_issue_date_bs as citizenship_issue_date_bs', 'applications.citizenship_issue_district as citizenship_issue_district', 'applications.monthly_income as monthly_income', 'applications.monthly_expenses as monthly_expenses', 'applications.monthly_saving as monthly_saving', 'applications.b_caste_code as caste_code', 'applications.b_marital_status as marital_status')
                ->LeftJoin('collateral_details', 'collateral_details.application_id','=','applications.application_id')
                ->withTrashed()->where('applications.application_id', $suggestion_id);
                if(!Auth::user()->hasRole('super-admin'))
                    $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                else
                $rawData = $rawData->first();

            }
            elseif($suggestion_type == 'guarantor')
            {
                $full_id = explode('_', $suggestion_id);

                if($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G1')
                {
                    $rawData = GuarantorDetails::select('guarantor1_name as name', 'guarantor1_father_name as father_name', 'guarantor1_grand_father_name as grand_father_name', 'guarantor1_spouse_name as spouse_name', 'guarantor1_subscription_id as subscription_id', 'guarantor1_dob as dob', 'guarantor1_dob_bs as dob_bs', 'guarantor1_contact_number as contact_number', 'g1_former_address as former_address', 'g1_p_province as p_province', 'g1_p_district as p_district', 'g1_p_localgovt as p_localgovt', 'g1_p_ward as p_ward', 'g1_p_tole as p_tole', 'g1_t_province as t_province', 'g1_t_district as t_district', 'g1_t_localgovt as t_localgovt', 'g1_t_ward as t_ward', 'g1_t_tole as t_tole', 'g1_citizenship_number as citizenship_number', 'g1_citizenship_issue_date as citizenship_issue_date', 'g1_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g1_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }
                elseif($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G2')
                {
                    $rawData = GuarantorDetails::select('guarantor2_name as name', 'guarantor2_father_name as father_name', 'guarantor2_grand_father_name as grand_father_name', 'guarantor2_spouse_name as spouse_name', 'guarantor2_subscription_id as subscription_id', 'guarantor2_dob as dob', 'guarantor2_dob_bs as dob_bs', 'guarantor2_contact_number as contact_number', 'g2_former_address as former_address', 'g2_p_province as p_province', 'g2_p_district as p_district', 'g2_p_localgovt as p_localgovt', 'g2_p_ward as p_ward', 'g2_p_tole as p_tole', 'g2_t_province as t_province', 'g2_t_district as t_district', 'g2_t_localgovt as t_localgovt', 'g2_t_ward as t_ward', 'g2_t_tole as t_tole', 'g2_citizenship_number as citizenship_number', 'g2_citizenship_issue_date as citizenship_issue_date', 'g2_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g2_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }
                elseif($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G3')
                {
                    $rawData = GuarantorDetails::select('guarantor3_name as name', 'guarantor3_father_name as father_name', 'guarantor3_grand_father_name as grand_father_name', 'guarantor3_spouse_name as spouse_name', 'guarantor3_subscription_id as subscription_id', 'guarantor3_dob as dob', 'guarantor3_dob_bs as dob_bs', 'guarantor3_contact_number as contact_number', 'g3_former_address as former_address', 'g3_p_province as p_province', 'g3_p_district as p_district', 'g3_p_localgovt as p_localgovt', 'g3_p_ward as p_ward', 'g3_p_tole as p_tole', 'g3_t_province as t_province', 'g3_t_district as t_district', 'g3_t_localgovt as t_localgovt', 'g3_t_ward as t_ward', 'g3_t_tole as t_tole', 'g3_citizenship_number as citizenship_number', 'g3_citizenship_issue_date as citizenship_issue_date', 'g3_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g3_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }
                elseif($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G4')
                {
                    $rawData = GuarantorDetails::select('guarantor4_name as name', 'guarantor4_father_name as father_name', 'guarantor4_grand_father_name as grand_father_name', 'guarantor4_spouse_name as spouse_name', 'guarantor4_subscription_id as subscription_id', 'guarantor4_dob as dob', 'guarantor4_dob_bs as dob_bs', 'guarantor4_contact_number as contact_number', 'g4_former_address as former_address', 'g4_p_province as p_province', 'g4_p_district as p_district', 'g4_p_localgovt as p_localgovt', 'g4_p_ward as p_ward', 'g4_p_tole as p_tole', 'g4_t_province as t_province', 'g4_t_district as t_district', 'g4_t_localgovt as t_localgovt', 'g4_t_ward as t_ward', 'g4_t_tole as t_tole', 'g4_citizenship_number as citizenship_number', 'g4_citizenship_issue_date as citizenship_issue_date', 'g4_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g4_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }

            }
            elseif($suggestion_type == 'land_lander')
            {
                $rawData = CollateralDetails::select('land_lander_name as name', 'land_lander_father_name as father_name', 'land_lander_grand_father_name as grand_father_name', 'land_lander_spouse_name as spouse_name',  'land_lander_dob as dob', 'land_lander_dob_bs as dob_bs', 'land_lander_contact_number as contact_number', 'land_lander_former_address as former_address', 'land_lander_p_province as p_province', 'land_lander_p_district as p_district', 'land_lander_p_localgovt as p_localgovt', 'land_lander_p_ward as p_ward', 'land_lander_p_tole as p_tole', 'land_lander_t_province as t_province', 'land_lander_t_district as t_district', 'land_lander_t_localgovt as t_localgovt', 'land_lander_t_ward as t_ward', 'land_lander_t_tole as t_tole', 'land_lander_citizenship_number as citizenship_number', 'land_lander_citizenship_issue_date as citizenship_issue_date', 'land_lander_citizenship_issue_date_bs as citizenship_issue_date_bs', 'land_lander_citizenship_issue_district as citizenship_issue_district')
                ->where('collateral_details.application_id', $suggestion_id);
                if(!Auth::user()->hasRole('super-admin'))
                    $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                else
                $rawData = $rawData->first();
            }
            else{
                return [];
            }

            if($rawData)
            {
                $fillContainer['borrower_name'] = $rawData->name;
                $fillContainer['borrower_name_en'] = $rawData->name_en;
                $fillContainer['borrower_gender'] = $rawData->gender;
                $fillContainer['b_father_name'] = $rawData->father_name;
                $fillContainer['b_mother_name'] = $rawData->mother_name;
                $fillContainer['b_grand_father_name'] = $rawData->grand_father_name;
                $fillContainer['b_spouse_name'] = $rawData->spouse_name;
                $fillContainer['b_son_name'] = $rawData->sons;
                $fillContainer['b_daughter_name'] = $rawData->daughters;

                $fillContainer['b_edu_qualification'] = $rawData->edu_qualification;
                $fillContainer['b_caste_code'] = $rawData->caste_code;
                $fillContainer['b_marital_status'] = $rawData->marital_status;
                $fillContainer['b_occupation'] = $rawData->occupation;
                $fillContainer['b_occupation_location'] = $rawData->occupation_location;

                $fillContainer['b_dob'] = $rawData->dob ? Carbon::parse($rawData->dob)->format('Y-m-d') : null;
                $fillContainer['b_dob_bs'] = $rawData->dob_bs;
                $fillContainer['contact_number'] = $rawData->contact_number;
                $fillContainer['citizenship_former_address'] = $rawData->former_address;
                $fillContainer['b_p_province'] = $rawData->p_province;
                $fillContainer['b_p_district'] = $rawData->p_district;
                $fillContainer['b_p_localgovt'] = $rawData->p_localgovt;
                $fillContainer['b_p_ward'] = $rawData->p_ward;
                $fillContainer['b_p_tole'] = $rawData->p_tole;
                $fillContainer['b_t_province'] = $rawData->t_province;
                $fillContainer['b_t_district'] = $rawData->t_district;
                $fillContainer['b_t_localgovt'] = $rawData->t_localgovt;
                $fillContainer['b_t_ward'] = $rawData->t_ward;
                $fillContainer['b_t_tole'] = $rawData->t_tole;
                $fillContainer['citizenship_number'] = $rawData->citizenship_number;
                $fillContainer['citizenship_issue_date'] =$rawData->citizenship_issue_date ? Carbon::parse($rawData->citizenship_issue_date)->format('Y-m-d') : null;
                $fillContainer['citizenship_issue_date_bs'] = $rawData->citizenship_issue_date_bs;
                $fillContainer['citizenship_issue_district'] = $rawData->citizenship_issue_district;   

                $fillContainer['monthly_income'] = $rawData->monthly_income;   
                $fillContainer['monthly_expenses'] = $rawData->monthly_expenses;   
                $fillContainer['monthly_saving'] = $rawData->monthly_saving;   
            }
            return response()->json($fillContainer, 200);
            
        }
        return response()->json($fillContainer, 400);
    }
    public function landerFill(Request $request)
    {
        $suggestion_type = $request->get('suggestion_type');
        $suggestion_id = $request->get('suggestion_id');
        
        $fillContainer =[];
        if($suggestion_id)
        {
            if($suggestion_type == 'applicant')
            {
                $rawData = $this->model->select('applications.borrower_name as name', 'applications.borrower_name_en as name_en', 'applications.borrower_gender as gender', 'applications.b_father_name as father_name', 'applications.b_grand_father_name as grand_father_name','applications.b_mother_name as mother_name', 'applications.b_spouse_name as spouse_name', 'applications.b_son_name as sons', 'applications.b_daughter_name as daughters', 'applications.b_dob as dob', 'applications.b_dob_bs as dob_bs', 'applications.contact_number as contact_number', 'applications.b_edu_qualification as edu_qualification', 'applications.b_occupation as occupation', 'applications.b_occupation_location as occupation_location', 'applications.citizenship_former_address as former_address', 'applications.b_p_province as p_province', 'applications.b_p_district as p_district', 'applications.b_p_localgovt as p_localgovt', 'applications.b_p_ward as p_ward', 'applications.b_p_tole as p_tole', 'applications.b_t_province as t_province', 'applications.b_t_district as t_district', 'applications.b_t_localgovt as t_localgovt', 'applications.b_t_ward as t_ward', 'applications.b_t_tole as t_tole', 'applications.citizenship_number as citizenship_number', 'applications.citizenship_issue_date as citizenship_issue_date', 'applications.citizenship_issue_date_bs as citizenship_issue_date_bs', 'applications.citizenship_issue_district as citizenship_issue_district', 'applications.monthly_income as monthly_income', 'applications.monthly_expenses as monthly_expenses', 'applications.monthly_saving as monthly_saving')
                ->LeftJoin('collateral_details', 'collateral_details.application_id','=','applications.application_id')
                ->withTrashed()->where('applications.application_id', $suggestion_id);
                if(!Auth::user()->hasRole('super-admin'))
                    $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                else
                $rawData = $rawData->first();
            }
            elseif($suggestion_type == 'guarantor')
            {
                $full_id = explode('_', $suggestion_id);
                if($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G1')
                {
                    $rawData = GuarantorDetails::select('guarantor1_name as name', 'guarantor1_father_name as father_name', 'guarantor1_grand_father_name as grand_father_name', 'guarantor1_spouse_name as spouse_name', 'guarantor1_subscription_id as subscription_id', 'guarantor1_dob as dob', 'guarantor1_dob_bs as dob_bs', 'guarantor1_contact_number as contact_number', 'g1_former_address as former_address', 'g1_p_province as p_province', 'g1_p_district as p_district', 'g1_p_localgovt as p_localgovt', 'g1_p_ward as p_ward', 'g1_p_tole as p_tole', 'g1_t_province as t_province', 'g1_t_district as t_district', 'g1_t_localgovt as t_localgovt', 'g1_t_ward as t_ward', 'g1_t_tole as t_tole', 'g1_citizenship_number as citizenship_number', 'g1_citizenship_issue_date as citizenship_issue_date', 'g1_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g1_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }
                elseif($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G2')
                {
                    $rawData = GuarantorDetails::select('guarantor2_name as name', 'guarantor2_father_name as father_name', 'guarantor2_grand_father_name as grand_father_name', 'guarantor2_spouse_name as spouse_name', 'guarantor2_subscription_id as subscription_id', 'guarantor2_dob as dob', 'guarantor2_dob_bs as dob_bs', 'guarantor2_contact_number as contact_number', 'g2_former_address as former_address', 'g2_p_province as p_province', 'g2_p_district as p_district', 'g2_p_localgovt as p_localgovt', 'g2_p_ward as p_ward', 'g2_p_tole as p_tole', 'g2_t_province as t_province', 'g2_t_district as t_district', 'g2_t_localgovt as t_localgovt', 'g2_t_ward as t_ward', 'g2_t_tole as t_tole', 'g2_citizenship_number as citizenship_number', 'g2_citizenship_issue_date as citizenship_issue_date', 'g2_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g2_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }
                elseif($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G3')
                {
                    $rawData = GuarantorDetails::select('guarantor3_name as name', 'guarantor3_father_name as father_name', 'guarantor3_grand_father_name as grand_father_name', 'guarantor3_spouse_name as spouse_name', 'guarantor3_subscription_id as subscription_id', 'guarantor3_dob as dob', 'guarantor3_dob_bs as dob_bs', 'guarantor3_contact_number as contact_number', 'g3_former_address as former_address', 'g3_p_province as p_province', 'g3_p_district as p_district', 'g3_p_localgovt as p_localgovt', 'g3_p_ward as p_ward', 'g3_p_tole as p_tole', 'g3_t_province as t_province', 'g3_t_district as t_district', 'g3_t_localgovt as t_localgovt', 'g3_t_ward as t_ward', 'g3_t_tole as t_tole', 'g3_citizenship_number as citizenship_number', 'g3_citizenship_issue_date as citizenship_issue_date', 'g3_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g3_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }
                elseif($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G4')
                {
                    $rawData = GuarantorDetails::select('guarantor4_name as name', 'guarantor4_father_name as father_name', 'guarantor4_grand_father_name as grand_father_name', 'guarantor4_spouse_name as spouse_name', 'guarantor4_subscription_id as subscription_id', 'guarantor4_dob as dob', 'guarantor4_dob_bs as dob_bs', 'guarantor4_contact_number as contact_number', 'g4_former_address as former_address', 'g4_p_province as p_province', 'g4_p_district as p_district', 'g4_p_localgovt as p_localgovt', 'g4_p_ward as p_ward', 'g4_p_tole as p_tole', 'g4_t_province as t_province', 'g4_t_district as t_district', 'g4_t_localgovt as t_localgovt', 'g4_t_ward as t_ward', 'g4_t_tole as t_tole', 'g4_citizenship_number as citizenship_number', 'g4_citizenship_issue_date as citizenship_issue_date', 'g4_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g4_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }

            }
            elseif($suggestion_type == 'land_lander')
            {
                $rawData = CollateralDetails::select('land_lander_name as name', 'land_lander_father_name as father_name', 'land_lander_grand_father_name as grand_father_name', 'land_lander_spouse_name as spouse_name',  'land_lander_dob as dob', 'land_lander_dob_bs as dob_bs', 'land_lander_contact_number as contact_number', 'land_lander_former_address as former_address', 'land_lander_p_province as p_province', 'land_lander_p_district as p_district', 'land_lander_p_localgovt as p_localgovt', 'land_lander_p_ward as p_ward', 'land_lander_p_tole as p_tole', 'land_lander_t_province as t_province', 'land_lander_t_district as t_district', 'land_lander_t_localgovt as t_localgovt', 'land_lander_t_ward as t_ward', 'land_lander_t_tole as t_tole', 'land_lander_citizenship_number as citizenship_number', 'land_lander_citizenship_issue_date as citizenship_issue_date', 'land_lander_citizenship_issue_date_bs as citizenship_issue_date_bs', 'land_lander_citizenship_issue_district as citizenship_issue_district')
                ->where('collateral_details.application_id', $suggestion_id);
                if(!Auth::user()->hasRole('super-admin'))
                    $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                else
                $rawData = $rawData->first();
            }
            else{
                return [];
            }
            if($rawData)
            {
                $fillContainer['land_lander_name'] = $rawData->name;
                $fillContainer['land_lander_name_en'] = $rawData->name_en;
                $fillContainer['land_lander_father_name'] = $rawData->father_name;
                $fillContainer['land_lander_grand_father_name'] = $rawData->grand_father_name;
                $fillContainer['land_lander_spouse_name'] = $rawData->spouse_name;

                $fillContainer['land_lander_dob'] = $rawData->dob ? Carbon::parse($rawData->dob)->format('Y-m-d') : null;
                $fillContainer['land_lander_dob_bs'] = $rawData->dob_bs;
                $fillContainer['land_lander_contact_number'] = $rawData->contact_number;
                $fillContainer['land_lander_former_address'] = $rawData->former_address;
                $fillContainer['land_lander_p_province'] = $rawData->p_province;
                $fillContainer['land_lander_p_district'] = $rawData->p_district;
                $fillContainer['land_lander_p_localgovt'] = $rawData->p_localgovt;
                $fillContainer['land_lander_p_ward'] = $rawData->p_ward;
                $fillContainer['land_lander_p_tole'] = $rawData->p_tole;
                $fillContainer['land_lander_t_province'] = $rawData->t_province;
                $fillContainer['land_lander_t_district'] = $rawData->t_district;
                $fillContainer['land_lander_t_localgovt'] = $rawData->t_localgovt;
                $fillContainer['land_lander_t_ward'] = $rawData->t_ward;
                $fillContainer['land_lander_t_tole'] = $rawData->t_tole;
                $fillContainer['land_lander_citizenship_number'] = $rawData->citizenship_number;
                $fillContainer['land_lander_citizenship_issue_date'] = $rawData->citizenship_issue_date ? Carbon::parse($rawData->citizenship_issue_date)->format('Y-m-d') : null;
                $fillContainer['land_lander_citizenship_issue_date_bs'] = $rawData->citizenship_issue_date_bs;
                $fillContainer['land_lander_citizenship_issue_district'] = $rawData->citizenship_issue_district;   

            }
            return response()->json($fillContainer, 200);
            
        }
        return response()->json($fillContainer, 400);
    }

    public function guarantorFill (Request $request)
    {
        $g_suggestion_type = $request->get('suggestion_type');
        $g_suggestion_id  = $request->get('suggestion_id');
        $gvalue = $request->get('gvalue');

        $fillContainer =[];
        if($g_suggestion_id)
        {
            if($g_suggestion_type == 'applicant')
            {
                $rawData = $this->model->select('applications.borrower_name as name', 'applications.b_father_name as father_name', 'applications.b_grand_father_name as grand_father_name', 'applications.b_spouse_name as spouse_name', 'collateral_details.subscription_id as subscription_id', 'applications.b_dob as dob', 'applications.b_dob_bs as dob_bs', 'applications.contact_number as contact_number', 'applications.citizenship_former_address as former_address', 'applications.b_p_province as p_province', 'applications.b_p_district as p_district', 'applications.b_p_localgovt as p_localgovt', 'applications.b_p_ward as p_ward', 'applications.b_p_tole as p_tole', 'applications.b_t_province as t_province', 'applications.b_t_district as t_district', 'applications.b_t_localgovt as t_localgovt', 'applications.b_t_ward as t_ward', 'applications.b_t_tole as t_tole', 'applications.citizenship_number as citizenship_number', 'applications.citizenship_issue_date as citizenship_issue_date', 'applications.citizenship_issue_date_bs as citizenship_issue_date_bs', 'applications.citizenship_issue_district as citizenship_issue_district')
                ->LeftJoin('collateral_details', 'collateral_details.application_id','=','applications.application_id')
                ->withTrashed()->where('applications.application_id', $g_suggestion_id);
                if(!Auth::user()->hasRole('super-admin'))
                    $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                else
                $rawData = $rawData->first();
            }
            elseif($g_suggestion_type == 'guarantor')
            {
                $full_id = explode('_', $g_suggestion_id);
                if($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G1')
                {
                    $rawData = GuarantorDetails::select('guarantor1_name as name', 'guarantor1_father_name as father_name', 'guarantor1_grand_father_name as grand_father_name', 'guarantor1_spouse_name as spouse_name', 'guarantor1_subscription_id as subscription_id', 'guarantor1_dob as dob', 'guarantor1_dob_bs as dob_bs', 'guarantor1_contact_number as contact_number', 'g1_former_address as former_address', 'g1_p_province as p_province', 'g1_p_district as p_district', 'g1_p_localgovt as p_localgovt', 'g1_p_ward as p_ward', 'g1_p_tole as p_tole', 'g1_t_province as t_province', 'g1_t_district as t_district', 'g1_t_localgovt as t_localgovt', 'g1_t_ward as t_ward', 'g1_t_tole as t_tole', 'g1_citizenship_number as citizenship_number', 'g1_citizenship_issue_date as citizenship_issue_date', 'g1_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g1_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }
                elseif($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G2')
                {
                    $rawData = GuarantorDetails::select('guarantor2_name as name', 'guarantor2_father_name as father_name', 'guarantor2_grand_father_name as grand_father_name', 'guarantor2_spouse_name as spouse_name', 'guarantor2_subscription_id as subscription_id', 'guarantor2_dob as dob', 'guarantor2_dob_bs as dob_bs', 'guarantor2_contact_number as contact_number', 'g2_former_address as former_address', 'g2_p_province as p_province', 'g2_p_district as p_district', 'g2_p_localgovt as p_localgovt', 'g2_p_ward as p_ward', 'g2_p_tole as p_tole', 'g2_t_province as t_province', 'g2_t_district as t_district', 'g2_t_localgovt as t_localgovt', 'g2_t_ward as t_ward', 'g2_t_tole as t_tole', 'g2_citizenship_number as citizenship_number', 'g2_citizenship_issue_date as citizenship_issue_date', 'g2_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g2_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }
                elseif($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G3')
                {
                    $rawData = GuarantorDetails::select('guarantor3_name as name', 'guarantor3_father_name as father_name', 'guarantor3_grand_father_name as grand_father_name', 'guarantor3_spouse_name as spouse_name', 'guarantor3_subscription_id as subscription_id', 'guarantor3_dob as dob', 'guarantor3_dob_bs as dob_bs', 'guarantor3_contact_number as contact_number', 'g3_former_address as former_address', 'g3_p_province as p_province', 'g3_p_district as p_district', 'g3_p_localgovt as p_localgovt', 'g3_p_ward as p_ward', 'g3_p_tole as p_tole', 'g3_t_province as t_province', 'g3_t_district as t_district', 'g3_t_localgovt as t_localgovt', 'g3_t_ward as t_ward', 'g3_t_tole as t_tole', 'g3_citizenship_number as citizenship_number', 'g3_citizenship_issue_date as citizenship_issue_date', 'g3_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g3_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }
                elseif($full_id[0] && isset($full_id[1]) && $full_id[0] == 'G4')
                {
                    $rawData = GuarantorDetails::select('guarantor4_name as name', 'guarantor4_father_name as father_name', 'guarantor4_grand_father_name as grand_father_name', 'guarantor4_spouse_name as spouse_name', 'guarantor4_subscription_id as subscription_id', 'guarantor4_dob as dob', 'guarantor4_dob_bs as dob_bs', 'guarantor4_contact_number as contact_number', 'g4_former_address as former_address', 'g4_p_province as p_province', 'g4_p_district as p_district', 'g4_p_localgovt as p_localgovt', 'g4_p_ward as p_ward', 'g4_p_tole as p_tole', 'g4_t_province as t_province', 'g4_t_district as t_district', 'g4_t_localgovt as t_localgovt', 'g4_t_ward as t_ward', 'g4_t_tole as t_tole', 'g4_citizenship_number as citizenship_number', 'g4_citizenship_issue_date as citizenship_issue_date', 'g4_citizenship_issue_date_bs as citizenship_issue_date_bs', 'g4_citizenship_issue_district as citizenship_issue_district')
                    ->where('guarantor_details.application_id', $full_id[1]);
                    if(!Auth::user()->hasRole('super-admin'))
                        $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                    else
                    $rawData = $rawData->first();

                }

            }
            elseif($g_suggestion_type == 'land_lander')
            {
                $rawData = CollateralDetails::select('land_lander_name as name', 'land_lander_father_name as father_name', 'land_lander_grand_father_name as grand_father_name', 'land_lander_spouse_name as spouse_name',  'land_lander_dob as dob', 'land_lander_dob_bs as dob_bs', 'land_lander_contact_number as contact_number', 'land_lander_former_address as former_address', 'land_lander_p_province as p_province', 'land_lander_p_district as p_district', 'land_lander_p_localgovt as p_localgovt', 'land_lander_p_ward as p_ward', 'land_lander_p_tole as p_tole', 'land_lander_t_province as t_province', 'land_lander_t_district as t_district', 'land_lander_t_localgovt as t_localgovt', 'land_lander_t_ward as t_ward', 'land_lander_t_tole as t_tole', 'land_lander_citizenship_number as citizenship_number', 'land_lander_citizenship_issue_date as citizenship_issue_date', 'land_lander_citizenship_issue_date_bs as citizenship_issue_date_bs', 'land_lander_citizenship_issue_district as citizenship_issue_district')
                ->where('collateral_details.application_id', $g_suggestion_id);
                if(!Auth::user()->hasRole('super-admin'))
                    $rawData = $rawData->whereOffice(Auth::user()->office_id)->first();
                else
                $rawData = $rawData->first();
            }
            else{
                return [];
            }

            if($rawData)
            {
                $fillContainer['guarantor'.$gvalue.'_name'] = $rawData->name;
                $fillContainer['guarantor'.$gvalue.'_father_name'] = $rawData->father_name;
                $fillContainer['guarantor'.$gvalue.'_grand_father_name'] = $rawData->grand_father_name;
                $fillContainer['guarantor'.$gvalue.'_spouse_name'] = $rawData->spouse_name;
                $fillContainer['guarantor'.$gvalue.'_subscription_id'] = $rawData->subscription_id;
                $fillContainer['guarantor'.$gvalue.'_dob'] = $rawData->dob ? Carbon::parse($rawData->dob)->format('Y-m-d') : null;
                $fillContainer['guarantor'.$gvalue.'_dob_bs'] = $rawData->dob_bs;
                $fillContainer['guarantor'.$gvalue.'_contact_number'] = $rawData->contact_number;
                $fillContainer['g'.$gvalue.'_former_address'] = $rawData->former_address;
                $fillContainer['g'.$gvalue.'_p_province'] = $rawData->p_province;
                $fillContainer['g'.$gvalue.'_p_district'] = $rawData->p_district;
                $fillContainer['g'.$gvalue.'_p_localgovt'] = $rawData->p_localgovt;
                $fillContainer['g'.$gvalue.'_p_ward'] = $rawData->p_ward;
                $fillContainer['g'.$gvalue.'_p_tole'] = $rawData->p_tole;
                $fillContainer['g'.$gvalue.'_t_province'] = $rawData->t_province;
                $fillContainer['g'.$gvalue.'_t_district'] = $rawData->t_district;
                $fillContainer['g'.$gvalue.'_t_localgovt'] = $rawData->t_localgovt;
                $fillContainer['g'.$gvalue.'_t_ward'] = $rawData->t_ward;
                $fillContainer['g'.$gvalue.'_t_tole'] = $rawData->t_tole;
                $fillContainer['g'.$gvalue.'_citizenship_number'] = $rawData->citizenship_number;
                $fillContainer['g'.$gvalue.'_citizenship_issue_date'] = $rawData->citizenship_issue_date ? Carbon::parse($rawData->citizenship_issue_date)->format('Y-m-d') : null;
                $fillContainer['g'.$gvalue.'_citizenship_issue_date_bs'] = $rawData->citizenship_issue_date_bs;
                $fillContainer['g'.$gvalue.'_citizenship_issue_district'] = $rawData->citizenship_issue_district;   
            }
            return response()->json($fillContainer, 200);
            
        }
        return response()->json($fillContainer, 400);
    }


    public function laghuFill(Request $request)
    {
        $laghu_suggestion_id = $request->get('laghu_suggestion_id') ;
        $data =[];
        if($laghu_suggestion_id)
        {
            $rawLaghu = CollateralDetails::select('*')->where('collateral_details.application_id', $laghu_suggestion_id);
            if(!Auth::user()->hasRole('super-admin'))
            
            $rawLaghu = $rawLaghu->whereOffice(Auth::user()->office_id)->first();
            else
            $rawLaghu = $rawLaghu->first();
    
            if($rawLaghu)
            {
                $data['rawLaghu']['microfinance_programe_name'] = $rawLaghu->microfinance_programe_name;
                $data['rawLaghu']['microfinance_center_number'] = $rawLaghu->microfinance_center_number;
                $data['rawLaghu']['microfinance_center_name'] = $rawLaghu->microfinance_center_name;
                $data['rawLaghu']['microfinance_group_number'] = $rawLaghu->microfinance_group_number;
                $data['rawLaghu']['microfinance_group'] = $rawLaghu->microfinance_group;
                $data['rawLaghu']['microfinance_chairman_name'] = $rawLaghu->microfinance_chairman_name;
                $data['rawLaghu']['microfinance_chairman_father_name'] = $rawLaghu->microfinance_chairman_father_name;
                $data['rawLaghu']['microfinance_chairman_grand_father_name'] = $rawLaghu->microfinance_chairman_grand_father_name;

                $data['rawLaghu']['microfinance_member_name_one'] = $rawLaghu->microfinance_member_name_one;
                $data['rawLaghu']['microfinance_member_father_name_one'] = $rawLaghu->microfinance_member_father_name_one;
                $data['rawLaghu']['microfinance_member_grand_father_name_one'] = $rawLaghu->microfinance_member_grand_father_name_one;

                $data['rawLaghu']['microfinance_member_name_two'] = $rawLaghu->microfinance_member_name_two;
                $data['rawLaghu']['microfinance_member_father_name_two'] = $rawLaghu->microfinance_member_father_name_two;
                $data['rawLaghu']['microfinance_member_grand_father_name_two'] = $rawLaghu->microfinance_member_grand_father_name_two;

                $data['rawLaghu']['microfinance_member_name_three'] = $rawLaghu->microfinance_member_name_three;
                $data['rawLaghu']['microfinance_member_father_name_three'] = $rawLaghu->microfinance_member_father_name_three;
                $data['rawLaghu']['microfinance_member_grand_father_name_three'] = $rawLaghu->microfinance_member_grand_father_name_three;

                $data['rawLaghu']['microfinance_member_name_four'] = $rawLaghu->microfinance_member_name_four;
                $data['rawLaghu']['microfinance_member_father_name_four'] = $rawLaghu->microfinance_member_father_name_four;
                $data['rawLaghu']['microfinance_member_grand_father_name_four'] = $rawLaghu->microfinance_member_grand_father_name_four;

                $data['rawLaghu']['microfinance_head'] = $rawLaghu->microfinance_member_name_one;
                $data['rawLaghu']['microfinance_head_father_name'] = $rawLaghu->microfinance_member_father_name_one;
                $data['rawLaghu']['microfinance_head_grand_father_name'] = $rawLaghu->microfinance_member_grand_father_name_one;
                

                return response()->json($data['rawLaghu'], 200);
            }
            return response()->json([], 400);

            
        }
        return response()->json([], 400);
    }

    public function uploadFiles($request, $application, $new_files, $old_files)
    {
        $tempFiles =[];
        foreach ($new_files as $type=>$file) {
            if($file){
                $file_size = $file->getSize();
                // $upload_max_filesize_kilobytes = Helper::parse_size(ini_get('post_max_size'));
                // $upload_max_filesize_kilobytes = Helper::parse_size(ini_get('upload_max_filesize'));
                $upload_max_filesize_kilobytes = Helper::parse_size(config('custom.filesize'));
                $upload_max_filesize_bytes     = $upload_max_filesize_kilobytes * 1024 ;

                if ($file_size < $upload_max_filesize_bytes && $file_size != 0)
                {
                    $allowedDocExtension = config('custom.allowedDocExtension');
                    $extension = $file->getClientOriginalExtension();
                    $check = in_array($extension, $allowedDocExtension);
                    if (!$check)
                    {
                        foreach($tempFiles as $fileToRemove)
                        {
                            $check = Storage::delete('public/documents/'.$application->application_id.'/'.$fileToRemove);
                        }
                        $tempFile['error'] = $extension . '.not allowed. The attachment must be '.implode(',', $allowedDocExtension);
                        return $tempFile;
                    }

                    $original_name = explode('.',$file->getClientOriginalName())[0];
                    $original_name = str_split($original_name, 100)[0] ;
                    $filename = time().'_'.$type.'_'.$original_name.'.'.$file->getClientOriginalExtension();

                    $path = $file->storeAs('public/documents/'.$application->application_id, $filename);
                    $tempFiles[$type]=$filename;
                }
                else
                {
                    foreach($tempFiles as $fileToRemove)
                    {
                        $check = Storage::delete('public/documents/'.$application->application_id.'/'.$fileToRemove);
                    }
                    $tempFile['error'] = "File upload failed. The file may not be greater than ".(int)($upload_max_filesize_kilobytes)."KB.";
                    
                    return $tempFile;
                }
            }
            else
            {
                $tempFiles[$type]=$old_files[$type];
            }
        }
        return $tempFiles;
    }

    public function displayFile($application_id, $filename)
    {
        $path = Storage::path('public/documents/'.$application_id.'/'. $filename);

        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);


        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;

    }

    public function submitFileDelete(Request $request)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);
        DB::beginTransaction();

        $application_id = $request->get('application_id'); 
        $file_type = $request->get('file_type');
        $filename = $request->get('filename');
        $data['row'] = ApplicationFiles::where('application_id', $application_id)->whereNotNull($file_type)->first();
        if($data['row'] && $data['row'][$file_type] == $filename)
        {
            if (Storage::exists('public/documents/'.$application_id.'/'. $filename))
            {
                $check = Storage::delete('public/documents/'.$application_id.'/'. $filename);

                $data['row']->update([$file_type=>null]);

                $latest = ApplicationStatus::create([
                    'application_id' => $application_id,
                    'status_code'  => 'edited',
                    'comment' => 'आवेदनको फाईल ('.$request->get('file_type').') हटाईइको  छ।',
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    ]);
        
                Application::where('application_id', $application_id)->update([
                    'latest_status_id'=> $latest->id,
                    'latest_status_code'=> $latest->status_code
                ]);
        
                OtherDetails::where('application_id', $application_id)->update([
                    'reviewed_by' => NULL,
                    'approved_by' => NULL,
                ]);


                ActivityLog::makeActivity('delete a file of '.$this->panel .' <a href="' . route($this->base_route . '.show', $application_id) . '">' .$data['row']['application_id'].' ('.$file_type . ')</a>', $this->panel, $application_id, 'updated');
                DB::commit();
                $request->session()->flash('success_message', 'File Deleted!');
            }
        }
        else{

            $request->session()->flash('error_message', 'Invalid Request!');
        }
        return redirect()->back()->withInput();;
    }

    /**
     * Change Status of Raw Grivances Form Submit.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatusOfApplication(ChangeStatusRequest $request)
    {
        $data = [
                'application_id' => $request->application_id,
                'status_code' => $request->status,
                'comment' => $request->comment,
                'user_id' => Auth::user()->id,
                'user_name' => $request->user_name,
            ];
        DB::beginTransaction(); 
        $latest = ApplicationStatus::create($data);
        if($latest)
        {

            $application = Application::where('application_id', $request->application_id)->first();
            $other_details = OtherDetails::where('application_id', $request->application_id)->first();

            if($request->status == 'approved')
            {
                $other_update['approved_by'] = $request->user_name;
            }
            elseif($request->status == 'reviewed')
            {
                $other_update['reviewed_by'] = $request->user_name;
                $other_update['approved_by'] = null;
            }
            else
            {
                $other_update['reviewed_by'] = null;
                $other_update['approved_by'] = null;
            }
            $other_details->update($other_update);

            $application->update([
                'latest_status_id'=> $latest->id,
                'latest_status_code'=> $latest->status_code
            ]);

            if(config('custom.activity_log') == true)
                ActivityLog::makeActivity('change a status of application <strong>'.$request->get('application_id').'</strong>', $this->panel, $request->application_id, 'updated', $request);
            
            
            DB::commit();

            $request->session()->flash('success_message', 'Status Changed !');
        }
        else
        {
            DB::rollBack();
            $request->session()->flash('error_message', 'Invalid Request !');

        }

        return back();

    }

}
