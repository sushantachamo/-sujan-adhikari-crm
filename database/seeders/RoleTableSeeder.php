<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $data = [
            [
                'name' => 'super-admin',
                // 'hint' => 'Can access every panel.',
                // 'status' => 1
            ],
            [
                'name' => 'admin',
                // 'hint' => 'Can access limited panel.',
                // 'status' => 1
            ],
            [
                'name' => 'user',
                // 'hint' => 'Can access few panel only.',
                // 'status' => 1
            ],
        ];

        $role_count = Role::get()->count();
        if($role_count <= 0)
        {
            foreach ($data as $row) {
                Role::create($row);
            }
            return "Success : Roles of super-admin, admin and user added";
        }
        else
        {
            return 'Invalid Request : There have already some roles';
        }




        
    }
}
