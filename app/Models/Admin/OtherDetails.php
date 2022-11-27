<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherDetails extends Model
{
    use HasFactory;
    protected $table = 'other_details';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
    
        'tamsuk_writer',
        'tamsuk_approved_by',
        'recommendator',
        'other1',
        'other2',
        'reviewed_by',
        'approved_by',
    ];

     /**
     * The attributes that  are in date format.
     *
     * @var array
     */
    protected $dates = [
       
    ];

    public function scopeWhereOffice($query, $office_id)
    {
        $own_offices = Office::select('id')->where('status', 1)
                ->where(function($query) use ($office_id){
                    $query->orWhere('id', $office_id)
                        ->orWhere('head_office', $office_id);
                        
            })->pluck('id')->toArray();
            
        return $query->LeftJoin('applications', 'applications.application_id','=','other_details.application_id')->whereIn('applications.office_id', $own_offices);
    }
}
