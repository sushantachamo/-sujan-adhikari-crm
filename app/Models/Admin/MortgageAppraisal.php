<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MortgageAppraisal extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'mortgage_appraisals';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'office_id',
        'application_id',
        'land_unit',
        't_land_area',
        'm_land_area',
        'v_land_area',
        'collateral_type',
        'land_market_price_per_unit',
        'land_market_price',
        'land_market_distinct_price',
        'land_government_price_per_unit',
        'land_government_price',
        'land_government_distinct_price',
        'land_value',

        'no_of_floor',
        'price_per_floor',
        'home_cost',
        'deducted_amount',
        'home_actual_value',
        'home_total_value',
        'total_assessment_value',
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
            
        return $query->whereIn('mortgage_appraisals.office_id', $own_offices);
    }
}
