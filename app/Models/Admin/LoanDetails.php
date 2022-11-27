<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDetails extends Model
{
    use HasFactory;
    protected $table = 'loan_details';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',

        'total_loan_amount',
        'total_loan_amount_in_word',
        'loan_amount',
        'loan_amount_in_word',
        'loan_title',
        'loan_purpose',
        'loan_interest_rate',
        'loan_period',
        'loan_period_type',
        'loan_pass_date',
        'loan_pass_date_bs',
        'loan_pass_meeting_date',
        'loan_pass_meeting_date_bs',
        'payment_amount',
        'payment_type',
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
            
        return $query->LeftJoin('applications', 'applications.application_id','=','loan_details.application_id')->whereIn('applications.office_id', $own_offices);
    }
}
