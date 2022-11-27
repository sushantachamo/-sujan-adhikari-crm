<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DartaChalani extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','office_id','record_id','record_type','register_number','fiscal_year','registered_at','subject','office_or_person','filename','identity_person','status','remarks'
    ];

     /**
     * The attributes that  are in date format.
     *
     * @var array
     */
    protected $dates = ['registered_at', 'deleted_at'];


    public function isDeletable()
    {
        // if ($this->email == 'root@ors.local') {
        //     return false;
        // }

        return true;
    }
}
