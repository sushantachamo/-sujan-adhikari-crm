<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuarantorDetails extends Model
{
    use HasFactory;
    protected $table = 'guarantor_details';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
    
        'guarantor1_name',
        'guarantor1_father_name',
        'guarantor1_grand_father_name',
        'guarantor1_spouse_name',
        'guarantor1_relation',
        'guarantor1_subscription_id',
        'guarantor1_dob',
        'guarantor1_dob_bs',
        'guarantor1_age',
        'guarantor1_contact_number',
        'g1_former_address',
        'g1_p_province',
        'g1_p_district',
        'g1_p_localgovt',
        'g1_p_ward',
        'g1_p_tole',
        'g1_t_province',
        'g1_t_district',
        'g1_t_localgovt',
        'g1_t_ward',
        'g1_t_tole',
        'g1_citizenship_number',
        'g1_citizenship_issue_date',
        'g1_citizenship_issue_date_bs',
        'g1_citizenship_issue_district',
        'guarantor1_subscription_number',
        'guarantor1_saving_title',
        'guarantor1_saving_amount',
        'guarantor1_share_amount',
        'guarantor1_agreed_amount',

        'guarantor2_name',
        'guarantor2_father_name',
        'guarantor2_grand_father_name',
        'guarantor2_spouse_name',
        'guarantor2_relation',
        'guarantor2_subscription_id',
        'guarantor2_dob',
        'guarantor2_dob_bs',
        'guarantor2_age',
        'guarantor2_contact_number',
        'g2_former_address',
        'g2_p_province',
        'g2_p_district',
        'g2_p_localgovt',
        'g2_p_ward',
        'g2_p_tole',
        'g2_t_province',
        'g2_t_district',
        'g2_t_localgovt',
        'g2_t_ward',
        'g2_t_tole',
        'g2_citizenship_number',
        'g2_citizenship_issue_date',
        'g2_citizenship_issue_date_bs',
        'g2_citizenship_issue_district',
        'guarantor2_subscription_number',
        'guarantor2_saving_title',
        'guarantor2_saving_amount',
        'guarantor2_share_amount',
        'guarantor2_agreed_amount',

        'guarantor3_name',
        'guarantor3_father_name',
        'guarantor3_grand_father_name',
        'guarantor3_spouse_name',
        'guarantor3_relation',
        'guarantor3_subscription_id',
        'guarantor3_dob',
        'guarantor3_dob_bs',
        'guarantor3_age',
        'guarantor3_contact_number',
        'g3_former_address',
        'g3_p_province',
        'g3_p_district',
        'g3_p_localgovt',
        'g3_p_ward',
        'g3_p_tole',
        'g3_t_province',
        'g3_t_district',
        'g3_t_localgovt',
        'g3_t_ward',
        'g3_t_tole',
        'g3_citizenship_number',
        'g3_citizenship_issue_date',
        'g3_citizenship_issue_date_bs',
        'g3_citizenship_issue_district',
        'guarantor3_subscription_number',
        'guarantor3_saving_title',
        'guarantor3_saving_amount',
        'guarantor3_share_amount',
        'guarantor3_agreed_amount',

        'guarantor4_name',
        'guarantor4_father_name',
        'guarantor4_grand_father_name',
        'guarantor4_spouse_name',
        'guarantor4_relation',
        'guarantor4_subscription_id',
        'guarantor4_dob',
        'guarantor4_dob_bs',
        'guarantor4_age',
        'guarantor4_contact_number',
        'g4_former_address',
        'g4_p_province',
        'g4_p_district',
        'g4_p_localgovt',
        'g4_p_ward',
        'g4_p_tole',
        'g4_t_province',
        'g4_t_district',
        'g4_t_localgovt',
        'g4_t_ward',
        'g4_t_tole',
        'g4_citizenship_number',
        'g4_citizenship_issue_date',
        'g4_citizenship_issue_date_bs',
        'g4_citizenship_issue_district',
        'guarantor4_subscription_number',
        'guarantor4_saving_title',
        'guarantor4_saving_amount',
        'guarantor4_share_amount',
        'guarantor4_agreed_amount',
    ];

    /**
     * The attributes that  are in date format.
     *
     * @var array
     */
    protected $dates = [
        'guarantor1_dob',
        'guarantor2_dob',
        'guarantor3_dob',
        'guarantor4_dob',
        'g1_citizenship_issue_date',
        'g2_citizenship_issue_date',
        'g3_citizenship_issue_date',
        'g4_citizenship_issue_date',
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
            
        return $query->LeftJoin('applications', 'applications.application_id','=','guarantor_details.application_id')->whereIn('applications.office_id', $own_offices);
    }
}
