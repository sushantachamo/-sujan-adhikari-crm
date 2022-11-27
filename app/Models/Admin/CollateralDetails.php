<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollateralDetails extends Model
{
    use HasFactory;
    protected $table = 'collateral_details';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',

        'subscription_id',
        'subscription_date',
        'subscription_date_bs',
        'account_number',
        'account_balance',
        'share_amount',
        'home_province',
        'home_district',
        'home_local_govt',
        'home_ward',
        'home_tole',
        'land_lander_name',
        'land_lander_name_en',
        'land_lander_father_name',
        'land_lander_grand_father_name',
        'land_lander_spouse_name',
        'land_lander_contact_number',
        'land_lander_dob',
        'land_lander_dob_bs',
        'land_lander_age',
        'land_lander_relation',
        'land_lander_citizenship_number',
        'land_lander_citizenship_issue_date',
        'land_lander_citizenship_issue_date_bs',
        'land_lander_citizenship_issue_district',
        'land_lander_former_address',
        'land_lander_p_province',
        'land_lander_p_district',
        'land_lander_p_localgovt',
        'land_lander_p_ward',
        'land_lander_p_tole',
        'land_lander_t_province',
        'land_lander_t_district',
        'land_lander_t_localgovt',
        'land_lander_t_ward',
        'land_lander_t_tole',
        'home_kitta_number',
        'home_sn_number',
        'home_area',
        'home_charkilla',
        'home_blocked_date',
        'home_blocked_date_bs',
        'home_invoice_number',
        'malpot_representative',
        'malpot_representative_c_info',
        'malpot_name',
        'h_collateral_valuator',
        'h_collateral_amount',
        'anshiyar1_name',
        'anshiyar1_age',
        'anshiyar1_province',
        'anshiyar1_district',
        'anshiyar1_localgovt',
        'anshiyar1_ward',
        'anshiyar1_tole',
        'anshiyar2_name',
        'anshiyar2_age',
        'anshiyar2_province',
        'anshiyar2_district',
        'anshiyar2_localgovt',
        'anshiyar2_ward',
        'anshiyar2_tole',
        'vehicle_name',
        'vehicle_color',
        'vehicle_model',
        'vehicle_engine_number',
        'vehicle_chassis_number',
        'vehicle_number',
        'vehicle_cc',
        'vehicle_company_name',
        'vehicle_price',
        'yatayat_representative',
        'yatayat_office_name',
        'vehicle_purchasing_org',
        'v_collateral_valuator',
        'business_register_office',
        'business_register_number',
        'business_register_date',
        'business_register_date_bs',
        'business_pan_number',
        'business_estimated_cost',
        'business_proprietor',
        'business_proprietor_relation',

        'general_loan_bank_name',
        'general_loan_cheque_number',
        'general_loan_cheque_amount',
        
        'microfinance_programe_name',
        'microfinance_center_number',
        'microfinance_center_name',
        'microfinance_group_number',
        'microfinance_group',
        'microfinance_chairman_name',
        'microfinance_chairman_father_name',
        'microfinance_chairman_grand_father_name',
        'microfinance_member_name_one',
        'microfinance_member_father_name_one',
        'microfinance_member_grand_father_name_one',
        'microfinance_member_name_two',
        'microfinance_member_father_name_two',
        'microfinance_member_grand_father_name_two',
        'microfinance_member_name_three',
        'microfinance_member_father_name_three',
        'microfinance_member_grand_father_name_three',
        'microfinance_member_name_four',
        'microfinance_member_father_name_four',
        'microfinance_member_grand_father_name_four',
        'microfinance_head',
        'microfinance_head_father_name',
        'microfinance_head_grand_father_name',
        'periodic_amount',
        'periodic_time',
        'periodic_start_date',
        'periodic_start_date_bs',
        'periodic_end_date',
        'periodic_end_date_bs',
        'periodic_loan_amount',
    ];

     /**
     * The attributes that  are in date format.
     *
     * @var array
     */
    protected $dates = [
        'subscription_date',
        'loan_pass_date',
        'loan_pass_meeting_date',
        'land_lander_dob',
        'land_lander_citizenship_issue_date',
        'home_blocked_date',
        'business_register_date',
        'periodic_start_date',
        'periodic_end_date',

        'dob',
        'citizenship_issue_date',
    ];

    public function scopeWhereOffice($query, $office_id)
    {
        $own_offices = Office::select('id')->where('status', 1)
                ->where(function($query) use ($office_id){
                    $query->orWhere('id', $office_id)
                        ->orWhere('head_office', $office_id);
                        
            })->pluck('id')->toArray();
            
        return $query->LeftJoin('applications', 'applications.application_id','=','collateral_details.application_id')->whereIn('applications.office_id', $own_offices);
    }
}
