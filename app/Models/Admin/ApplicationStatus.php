<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'application_id',
		'status_code',
		'comment',
		'is_notifiable',
        'user_id',
        'user_name',
    ];

    protected $dates = ['created_at'];

    public function scopeTotalApproved()
    {
        return $this->where('status_code', 'approved')->count();
    }

    public function scopeTotalInvalid ()
    {
        return $this->where('status_code', '!=', 'invalid')->groupBy('application_id')->count();
    }

    /**
     * User belongs to one User
     * @return relation many to one
     */
    public function user()
    {
        return $this->hasMany(\App\Models\User::class, 'id', 'user_id');
    }
}
