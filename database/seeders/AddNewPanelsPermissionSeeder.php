<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class AddNewPanelsPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =  [
            'Mortgage Appraisal' => [
                'panel_name' => 'Mortgage Appraisal',
                'actions' => ['create', 'update', 'show', 'download', 'delete', 'restore', 'forceDelete'],
                ],
            ];
	        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

	        foreach ($permissions as $panel_name => $data) {

	        	$panel_name = Str::lower($data['panel_name']);

	        	$possible_actions = $data['actions'];

	        	foreach ($possible_actions as $action) {
	        		$permission_name = $action.'-'.$panel_name;

	        		Permission::create(['name'=>$permission_name]);
	        	}

	        }

        }
    }