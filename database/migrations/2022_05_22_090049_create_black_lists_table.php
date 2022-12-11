<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class CreateBlackListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissions =  [
            'Blacklist' => [
                'panel_name' => 'Blacklist',
                'actions' => ['import', 'show'],
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
        Schema::create('black_lists', function (Blueprint $table) {
            $table->id();
            $table->string('black_list_no');
            $table->string('black_list_date')->nullable();
            $table->text('borrower_name')->nullable();
            $table->text('associated_person_or_firm')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $permissions =  [
            'Blacklist' => [
	    		'panel_name' => 'Blacklist',
	    		'actions' => ['import', 'show'],
	    		],
            ];
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

	        foreach ($permissions as $panel_name => $data) {

	        	$panel_name = Str::lower($data['panel_name']);

	        	$possible_actions = $data['actions'];

	        	foreach ($possible_actions as $action) {
	        		$permission_name = $action.'-'.$panel_name;

	        		Permission::where('name', $permission_name)->delete();
	        	}

	        }

        Schema::dropIfExists('black_lists');
    }
}
