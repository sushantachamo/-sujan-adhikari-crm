<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


class Task extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'application_id',
        'type',
        'details',
        'type1',
        'details1',
        'type2',
        'details2',
        'type3',
        'details3',
        'type4',
        'details4',
        'description',
        'number_of_dues',
        'due_principal_amount',
        'due_interest_amount',
        'follow_up_at_bs',
        'follow_up_at',
        'document',
        'created_by',
        'updated_by',
        'user_id',
        'office_id',
        'order'
    ];

    /**
     * User belongs to one User
     * @return relation many to one
     */
    public function application()
    {
        return $this->hasOne(\App\Models\Admin\Application::class, 'application_id', 'application_id');
    }

    /**
     * User belongs to one User
     * @return relation many to one
     */
    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'created_by');
    }

    /**
     * User belongs to one User
     * @return relation many to one
     */
    public function userAssign()
    {
        return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }

    public function office()
    {
        return $this->hasOne(\App\Models\Admin\Office::class, 'id', 'office_id');
    }
}
