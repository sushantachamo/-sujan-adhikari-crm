<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','caption_title','caption_body','image','alt_text','rank','status'
    ];

    public function isDeletable()
    {
        // if ($this->email == 'root@ors.local') {
        //     return false;
        // }

        return true;
    }
}
