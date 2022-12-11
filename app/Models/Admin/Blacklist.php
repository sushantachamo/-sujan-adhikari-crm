<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    use HasFactory;
    protected $table = 'black_lists';
    
    protected $fillable = [
        'black_list_no',
        'black_list_date',
        'borrower_name',
        'associated_person_or_firm',
    ];  
}
