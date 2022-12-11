<?php

namespace App\Exports;
use Auth;

use Carbon\Carbon;
use App\Services\DateConverter;
use App\Models\Admin\Application;
use App\Models\Admin\LoanDetails;

use App\Libraries\HelperClass\ViewHelper;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;

class ReportExport implements FromCollection
{

    protected $id;

    function __construct($request_array) {
            $this->request_array = $request_array;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = [];
        $data['request'] = $this->request_array;
        $request = $this->request_array;

        $to_get = ['applications.id'];
        $title = [];

        if(isset($data['request']['subscription_id']) && $data['request']['subscription_id'] == 'on')
        {
            $to_get[] ='loan_details.subscription_id';
            $title[]='subscription_id';
        }   
        
        if(isset($data['request']['borrower_name']) && $data['request']['borrower_name'] == 'on')
        {
            $to_get[] ='applications.borrower_name';
            $title[]='borrower_name';
        }   
        
        if(isset($data['request']['borrower_name_en']) && $data['request']['borrower_name_en'] == 'on')
        {
            $to_get[] ='applications.borrower_name_en';
            $title[]='borrower_name_en';
        }   
        
        if(isset($data['request']['subscription_date_bs']) && $data['request']['subscription_date_bs'] == 'on')
        {
            $to_get[] ='loan_details.subscription_date_bs';
            $title[]='subscription_date_bs';
        }   
        
        if(isset($data['request']['borrower_gender']) && $data['request']['borrower_gender'] == 'on')
        {
            $to_get[] ='applications.borrower_gender';
            $title[]='borrower_gender';
        }   
         
        
        if(isset($data['request']['b_dob_bs']) && $data['request']['b_dob_bs'] == 'on')
        {
            $to_get[] ='applications.b_dob_bs';
            $title[]='b_dob_bs';
        }   
        
        if(isset($data['request']['b_grand_father_name']) && $data['request']['b_grand_father_name'] == 'on')
        {
            $to_get[] ='applications.b_grand_father_name';
            $title[]='b_grand_father_name';
        }   
        
        if(isset($data['request']['b_father_name']) && $data['request']['b_father_name'] == 'on')
        {
            $to_get[] ='applications.b_father_name';
            $title[]='b_father_name';
        }   
        
        if(isset($data['request']['b_marital_status']) && $data['request']['b_marital_status'] == 'on')
        {
            $to_get[] ='applications.b_marital_status';
            $title[]='b_marital_status';
        }   
        
        if(isset($data['request']['citizenship_number']) && $data['request']['citizenship_number'] == 'on')
        {
            $to_get[] ='applications.citizenship_number';
            $title[]='citizenship_number';
        }   
        
        if(isset($data['request']['citizenship_issue_date_bs']) && $data['request']['citizenship_issue_date_bs'] == 'on')
        {
            $to_get[] ='applications.citizenship_issue_date_bs';
            $title[]='citizenship_issue_date_bs';
        } 
        if(isset($data['request']['citizenship_issue_district']) && $data['request']['citizenship_issue_district'] == 'on')
        {
            $to_get[] ='applications.citizenship_issue_district';
            $title[]='citizenship_issue_district';
        } 
        if(isset($data['request']['b_caste_code']) && $data['request']['b_caste_code'] == 'on')
        {
            $to_get[] ='applications.b_caste_code';
            $title[]='b_caste_code';
        } 
        if(isset($data['request']['address']) && $data['request']['address'] == 'on')
        {
            $to_get[] ='applications.b_p_province';
            $to_get[] ='applications.b_p_district';
            $to_get[] ='applications.b_p_localgovt';
            $to_get[] ='applications.b_p_ward';
            $to_get[] ='applications.b_p_tole';

            $title[]='address';
        }   
        if(isset($data['request']['share_certificate_number']) && $data['request']['share_certificate_number'] == 'on')
        {
            // $to_get[] ='loan_details.share_certificate_number';
            $title[]='share_certificate_number';
        }
        if(isset($data['request']['share_amount']) && $data['request']['share_amount'] == 'on')
        {
            $to_get[] ='loan_details.share_amount';
            $title[]='share_amount';
        } 
        $data['rows'] = Application::select($to_get)->LeftJoin('loan_details','applications.application_id', '=', 'loan_details.application_id');
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['rows'] = $data['rows']->whereOffice(Auth::user()->office_id);
            
        }

        $data['rows'] = $data['rows']->where(function ($query) use ($request) {

            if (isset($request['filter_loan_type']) && $request['filter_loan_type'] && $request['filter_loan_type'] !== 'all') {
                $query->where('applications.loan_type', $request['filter_loan_type']);
            }
            
            if(isset($request['registered_at_from']) && isset($request['registered_at_to']) && $request['registered_at_from'] && $request['registered_at_to'])
            {
                $query->whereBetween('loan_details.loan_pass_date', [$request['registered_at_from'], $request['registered_at_to']]);
            }
            
        })
        ->get();

        foreach($title as $ttl)
        {
            $data ['datas'][0][$ttl] = config('custom.application_export_fields.'.$ttl);
        }
        
        foreach($data['rows'] as $key => $d)
        {
            foreach($title as $t)
            {
                if($t=='address')
                {
                    $data ['datas'][$key+1][$t]= ViewHelper::getAddressString($d->b_p_province, $d->b_p_district, $d->b_p_localgovt, $d->b_p_ward, $d->b_p_tole);

                }
                elseif($t=='borrower_gender')
                {
                    $data ['datas'][$key+1][$t]= $d->borrower_gender == 'male'? '1' : '2';

                }
                elseif($t=='citizenship_issue_district')
                {
                    $data ['datas'][$key+1][$t]= '-';

                }
                else
                $data ['datas'][$key+1][$t]= $d[$t];
            }
        }
        $collection = collect($data['datas']);
        return $collection;
    }
}
