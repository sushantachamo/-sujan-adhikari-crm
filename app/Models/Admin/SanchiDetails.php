<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanchiDetails extends Model
{
    use HasFactory;
    protected $table = 'sanchi_details';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
        
        'sanchi1_name',
        'sanchi1_age',
        'sanchi1_province',
        'sanchi1_district',
        'sanchi1_localgovt',
        'sanchi1_ward',
        'sanchi1_tole',

        'sanchi2_name',
        'sanchi2_age',
        'sanchi2_province',
        'sanchi2_district',
        'sanchi2_localgovt',
        'sanchi2_ward',
        'sanchi2_tole',
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
            
        return $query->LeftJoin('applications', 'applications.application_id','=','sanchi_details.application_id')->whereIn('applications.office_id', $own_offices);
    }
}
