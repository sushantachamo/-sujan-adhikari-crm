<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use App\Services\DateConverter;
use App\Models\Admin\Application;
use App\Models\Admin\ApplicationFiles;
use App\Models\Admin\LoanDetails;
use App\Models\Admin\CollateralDetails;
use App\Models\Admin\GuarantorDetails;
use App\Models\Admin\SanchiDetails;
use App\Models\Admin\OtherDetails;
use App\Models\Admin\CreditAnalysis;
use App\Models\Admin\TaketaPatra;

use App\Libraries\HelperClass\ViewHelper;
use Illuminate\Support\Facades\DB;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;


class ReportController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.report';
    protected $view_path = 'admin.report';
    protected $panel = 'Report';

    public function __construct(Application $application)
    {
        $this->model = $application;
    }
    public function index(Request $request)
    {
        abort_unless(\Gate::allows('generate-'.Str::lower($this->panel)), 403);
        $data=[];
        return view(parent::loadDefaultDataToView($this->view_path . '.advance_report_form'), compact('data'));
    }
   
    public function advanceReport(Request $request)
    {
        abort_unless(\Gate::allows('generate-'.Str::lower($this->panel)), 403);
        $data = [];
        $data['request'] = $request->get('request');
        $data['loan_types'] = ['all'=> 'सबै'] + config('custom.loan_types');

        return view(parent::loadDefaultDataToView($this->view_path . '.advance_report_form'), compact('data'));
    }
    public function advanceReportResult(Request $request)
    {
        abort_unless(\Gate::allows('generate-'.Str::lower($this->panel)), 403);
        ini_set('memory_limit', '-1');
        $data = [];
        $data['request'] = $request->all();
        $to_get = ['applications.id', 'applications.application_id'];

        if(isset($data['request']['subscription_id']) && $data['request']['subscription_id'] == 'on')
        {
            $to_get[] ='collateral_details.subscription_id';
        }   
        
        if(isset($data['request']['borrower_name']) && $data['request']['borrower_name'] == 'on')
        {
            $to_get[] ='applications.borrower_name';
        }   
        
        if(isset($data['request']['borrower_name_en']) && $data['request']['borrower_name_en'] == 'on')
        {
            $to_get[] ='applications.borrower_name_en';
        }   
        
        if(isset($data['request']['subscription_date_bs']) && $data['request']['subscription_date_bs'] == 'on')
        {
            $to_get[] ='collateral_details.subscription_date_bs';
        }   
        
        if(isset($data['request']['borrower_gender']) && $data['request']['borrower_gender'] == 'on')
        {
            $to_get[] ='applications.borrower_gender';
        }   
        
        if(isset($data['request']['b_dob_bs']) && $data['request']['b_dob_bs'] == 'on')
        {
            $to_get[] ='applications.b_dob_bs';
        }   
        
        if(isset($data['request']['b_grand_father_name']) && $data['request']['b_grand_father_name'] == 'on')
        {
            $to_get[] ='applications.b_grand_father_name';
        }   
        
        if(isset($data['request']['b_father_name']) && $data['request']['b_father_name'] == 'on')
        {
            $to_get[] ='applications.b_father_name';
        }   
        
        if(isset($data['request']['b_marital_status']) && $data['request']['b_marital_status'] == 'on')
        {
            $to_get[] ='applications.b_marital_status';
        }   
        
        if(isset($data['request']['citizenship_number']) && $data['request']['citizenship_number'] == 'on')
        {
            $to_get[] ='applications.citizenship_number';
        }   
        
        if(isset($data['request']['citizenship_issue_date_bs']) && $data['request']['citizenship_issue_date_bs'] == 'on')
        {
            $to_get[] ='applications.citizenship_issue_date_bs';
        } 
        if(isset($data['request']['citizenship_issue_district']) && $data['request']['citizenship_issue_district'] == 'on')
        {
            $to_get[] ='applications.citizenship_issue_district';
        } 
        if(isset($data['request']['b_caste_code']) && $data['request']['b_caste_code'] == 'on')
        {
            $to_get[] ='applications.b_caste_code';
        } 
        if(isset($data['request']['address']) && $data['request']['address'] == 'on')
        {
            $to_get[] ='applications.b_p_province';
            $to_get[] ='applications.b_p_district';
            $to_get[] ='applications.b_p_localgovt';
            $to_get[] ='applications.b_p_ward';
            $to_get[] ='applications.b_p_tole';
        }   
        if(isset($data['request']['share_certificate_number']) && $data['request']['share_certificate_number'] == 'on')
        {
            // $to_get[] ='loan_details.share_certificate_number';
        }
        if(isset($data['request']['share_amount']) && $data['request']['share_amount'] == 'on')
        {
            $to_get[] ='collateral_details.share_amount';
        } 

        

        $data['rows'] = Application::select($to_get)->LeftJoin('collateral_details','applications.application_id', '=', 'collateral_details.application_id')->LeftJoin('loan_details','applications.application_id', '=', 'loan_details.application_id');
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['rows'] = $data['rows']->whereOffice(Auth::user()->office_id);
            
        }
        $data['rows'] = $data['rows']->where(function ($query) use ($request) {

            if ($request->has('filter_loan_type') && $request->get('filter_loan_type') && $request->get('filter_loan_type') !== 'all') {
                $query->where('applications.loan_type', $request->get('filter_loan_type'));
            }
            
            if($request->has('registered_at_from') && $request->has('registered_at_to') && $request->get('registered_at_from') && $request->get('registered_at_to'))
            {
                $query->whereBetween('loan_details.loan_pass_date', [$request->get('registered_at_from'), $request->get('registered_at_to')]);
            }
        })
        ->get();
        
        
        return view(parent::loadDefaultDataToView($this->view_path . '.advance_report_result'), compact('data'));
    }

    public function advanceReportResultExport (Request $request)
    {
        abort_unless(\Gate::allows('excelExport-'.Str::lower($this->panel)), 403);
        $request_array = $request->get('request');
        ini_set('memory_limit', '-1');
        return Excel::download(new ReportExport($request_array), 'advance_report.xlsx');

    }
}
