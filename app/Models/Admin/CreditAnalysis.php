<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CreditAnalysis extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'credit_analysis';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'office_id',
        'application_id',

        'permanent_profession',
        'income_regularity',
        'income_loan_period_coordination',
        'business_loan_period_coordination',
        'utility_of_loan',
        'loan_utilization_earnings',
        'economic_growth',
        'business_market_condition',
        'other_sector_situation',
        'self_saving',
        'capacity_total',

        'debt_collection_habits',
        'other_org_debt_paying_habits',
        'economic_behavior_society',
        'social_prestige',
        'residential_status',
        'human_relation_in_society',
        'personal_moral_character',
        'state_of_eating',
        'fear_of_debt',
        'state_of_economic_growth',
        'character_total',

        'collateral_sell_condition',
        'loan_amount_collateral_condition',
        'ownership_condition_collateral',
        'pledged_location',
        'security_of_pledged',
        'collateral_total',

        'regular_share_saving_status',
        'growth_of_share_saving_in_institution',
        'cash_mobilization',
        'debt_recovery_status',
        'property_ownership',
        'capital_total',

        'weather_impact_on_business',
        'disease_impact_on_business',
        'legal_recognition_of_business',
        'environment_impact_on_business',
        'impact_of_profession_on_members',
        'condition_total',

        'grand_total',
        'status',
        'deleted_at',
    ];

    /**
     * The attributes that  are in date format.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    

    /**
     * Office has Many Users
     * @return relation many to one
     */
    public function users()
    {
        return $this->hasMany(User::class, 'office_id', 'id');
    }

    /**
     * User belongs to one Office
     * @return relation many to one
     */
    public function Office()
    {
        return $this->belongsTo(Office::class, 'office_id', 'id');
    }

    public function scopeWhereOffice($query, $office_id)
    {
        $own_offices = Office::select('id')->where('status', 1)
                ->where(function($query) use ($office_id){
                    $query->orWhere('id', $office_id)
                        ->orWhere('head_office', $office_id);
                        
            })->pluck('id')->toArray();
            
        return $query->whereIn('credit_analysis.office_id', $own_offices);
    }
}
