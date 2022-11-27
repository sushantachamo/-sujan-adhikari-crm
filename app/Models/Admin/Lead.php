<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'application_id',
        'loan_account_number',
        'follow_up_at_bs',
        'follow_up_at',
        'user_id',
        'reason',
        'status'
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
        return $this->hasOne(\App\Models\User::class, 'id', 'user_id');
    }

    /**
     * User belongs to one User
     * @return relation many to one
     */
    public function loanDetails()
    {
        return $this->hasOne(\App\Models\Admin\LoanDetails::class, 'application_id', 'application_id');
    }
}
