<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationFiles extends Model
{
    use HasFactory;
    protected $table = 'application_files';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'application_id',
         
        'photo',
        'citizenship_front',
        'citizenship_back',
        'signature',

        'lalpurja',
        'charkilla',
        'tiro_rasid',
        'rokka_patra',
        'land_lander_citizenship_front',
        'land_lander_citizenship_back',

        'blue_book',
        'route_permit',
        
        'muddati_rasid',
        
        'business_registration_card',
        'share_certificate',
        'pan_certificate',

        'g1_citizenship_front',
        'g1_citizenship_back',
        'g1_photo',
        'g2_citizenship_front',
        'g2_citizenship_back',
        'g2_photo',
        'g3_citizenship_front',
        'g3_citizenship_back',
        'g3_photo',
        'g4_citizenship_front',
        'g4_citizenship_back',
        'g4_photo',


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
            
        return $query->LeftJoin('applications', 'applications.application_id','=','loan_details.application_id')->whereIn('applications.office_id', $own_offices);
    }
}
