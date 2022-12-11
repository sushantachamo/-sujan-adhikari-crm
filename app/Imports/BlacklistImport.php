<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BlacklistImport implements ToCollection
{
    // /**
    //  * @param array $row
    //  *
    //  * @return User|null
    //  */
    // public function model(array $row)
    // {

    //     dd($row);

    // }
    public $collection;


    public function collection(Collection $collection)
    {

         return $collection ;
    }



}