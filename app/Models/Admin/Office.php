<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;


class Office extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'registration_number',
        'registration_date',
        'registration_date_bs',
        'register_nikaye',
        'name_en',
        'name_np',
        'province',
        'district',
        'localgovt',
        'ward',
        'tole',
        'former_address',
        'phone',
        'email',
        'head_office',

        'president_name',
        'manager_name',
        'vice_president_name',
        'secretary',
        'treasurer',
        'loan_coordinator',
        'loan_member_1',
        'loan_member_2',
        'slogan',
        'remarks',
        'agent_name',

        'expiration_date',
        'expiration_date_bs',
        'status',
        'deleted_at',
        'image',
    ];

    /**
     * The attributes that  are in date format.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'registration_date', 'expiration_date'];
    

    /**
     * Office has Many Users
     * @return relation many to one
     */
    public function users()
    {
        return $this->hasMany(User::class, 'office_id', 'id');
    }

    /**
     * Office has Many Users
     * @return relation many to one
     */
    public function applications()
    {
        return $this->hasMany(Application::class, 'office_id', 'id');
    }

    /**
     * Office has Many Users
     * @return relation many to one
     */
    public function taketaPatras()
    {
        return $this->hasMany(TaketaPatra::class, 'office_id', 'id');
    }
    
}
