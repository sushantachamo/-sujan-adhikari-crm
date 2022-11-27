<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Admin\Office;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        'latest_status_id',
        'latest_status_code',
        'loan_type',
        'user_id',
        'office_id',
        'status',

        'borrower_name',
        'borrower_name_en',
        'borrower_gender',
        'b_dob',
        'b_dob_bs',
        'b_age',
        'b_grand_father_name',
        'b_father_name',
        'b_mother_name',
        'b_spouse_name',
        'b_son_name',
        'b_daughter_name',
        'b_edu_qualification',
        'b_caste_code',
        'b_marital_status',
        'b_occupation',
        'b_occupation_location',
        'b_p_province',
        'b_p_district',
        'b_p_localgovt',
        'b_p_ward',
        'b_p_tole',
        'b_t_province',
        'b_t_district',
        'b_t_localgovt',
        'b_t_ward',
        'b_t_tole',
        'monthly_income',
        'monthly_expenses',
        'monthly_saving',
        'citizenship_number',
        'citizenship_issue_date',
        'citizenship_issue_date_bs',
        'citizenship_issue_district',
        'citizenship_former_address',
        'contact_number',
        'loan_apply_date',
        'loan_apply_date_bs',
        'loan_demand_amount',
    ]; 

    /**
     * The attributes that  are in date format.
     *
     * @var array
     */
    protected $dates = [
        'b_dob',
        'citizenship_issue_date',
        'loan_apply_date',
        'subscription_date',
        'loan_pass_date',
        'loan_pass_meeting_date',
        'land_lander_dob',
        'land_lander_citizenship_issue_date',
        'home_blocked_date',
        'business_register_date',
        'periodic_start_date',
        'periodic_end_date',
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

    /**
     * User belongs to one Office
     * @return relation many to one
     */
    public function Office()
    {
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }

    /**
     * Applications has Many Taketa Patra
     * @return relation many to one
     */
    public function taketapatras()
    {
        return $this->hasMany(TaketaPatra::class, 'application_id', 'id');
    }

    public function scopeWhereOffice($query, $office_id)
    {
        $own_offices = Office::select('id')->where('status', 1)
                ->where(function($query) use ($office_id){
                    $query->orWhere('id', $office_id)
                        ->orWhere('head_office', $office_id);
                        
            })->pluck('id')->toArray();
            
        return $query->whereIn('applications.office_id', $own_offices);
    }

    public function scopeApplicationOfStatus($query, $status = null, $daterange = null)
    {
        $latest_status = [];
        $application_ids = [];

        $latest_status = $this->pluck('latest_status_code', 'application_id')->toArray();
        foreach ($latest_status as $application_id => $status_code) {
            if($status_code == $status || $status == null)
            {
            	$application_ids[] = $application_id;
            }
            
        }    


        return $query->whereIn('application_id', $application_ids);
    }

    public function scopeCountGrievances($query, $office_id = null)
    {
        $latest_status = [];

        $total_application = 0;
        $total_new = 0;
        $total_reviewed = 0;
        $total_approved = 0;
        $total_invalid = 0;

        if($office_id != null)
        {   
            $own_offices = Office::select('id')->where('status', 1)
                ->where(function($query) use ($office_id){
                    $query->orWhere('id', $office_id)
                        ->orWhere('head_office', $office_id);
            })->pluck('id')->toArray();

            $latest_status = $query->whereIn('applications.office_id', $own_offices)
                    ->pluck('latest_status_code', 'application_id')->toArray();
        }
        else
        {
            $latest_status = $query->pluck('latest_status_code', 'application_id')->toArray();
        }

        foreach ($latest_status as $application_id => $status_code) {

                if($status_code == 'new')
                    $total_new++;
                if($status_code == 'reviewed')
                    $total_reviewed++;

                if($status_code == 'approved')
                    $total_approved++;

                if($status_code == 'invalid' ||$status_code == 'declined' || $status_code == 'duplicate')
                    $total_invalid++; 
        } 

        $count = [
                'reviewd'=> $total_reviewed,
                'approved' => $total_approved,
                'invalid' => $total_invalid,
                'total' => $total_new + $total_reviewed + $total_approved + $total_invalid
            ];
        return $count;
    }
    public function statues(){

        return $this->hasMany(ApplicationStatus::class, 'application_id', 'application_id');
    }

    /**
     * User belongs to one User
     * @return relation many to one
     */
    public function user()
    {
        return $this->hasMany(\App\Models\User::class, 'id', 'user_id');
    }
}