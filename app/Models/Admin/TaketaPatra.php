<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaketaPatra extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'office_id',
        'application_id',
        'capital',
        'interest',
        'other',
        'total',
        'letter_type',
        'last_installment_date',
        'last_installment_date_bs',
        'status',
        'deleted_at',
    ];

    /**
     * The attributes that  are in date format.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at','last_installment_date'];
    

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
            
        return $query->whereIn('taketa_patras.office_id', $own_offices);
    }

    
}
