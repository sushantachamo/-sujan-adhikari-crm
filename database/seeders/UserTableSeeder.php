<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= 
        [
        	'name' => 'SuperAdmin',
        	'email' => 'docsgenerator@vtechnepal.com',
	        'password' => Hash::make('login4docsgenerator'),
        ];

        $user_count = \App\Models\User::get()->count();
        if($user_count <= 0)
        {
        	return \App\Models\User::create($data);
        }
        else
        {
        	dd('Invalid Request');
        }
    }
}
