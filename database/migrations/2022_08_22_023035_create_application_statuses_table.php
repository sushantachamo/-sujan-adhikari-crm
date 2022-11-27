<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('application_id');
            $table->string('status_code');
            $table->text('comment')->nullable();
            $table->string('user_id')->nullable(); // user who changes the status of the application. 
            $table->string('user_name')->nullable(); // user who changes the status of the application. 
            $table->tinyInteger('is_notifiable')->unsigned()->default(0); //0 = no,  1 = yes
            $table->timestamps();
        });
        Schema::table('applications', function (Blueprint $table) {
            $table->string('latest_status_code')->nullable()->after('office_id');
            $table->integer('latest_status_id')->nullable()->after('office_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_statuses');
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('latest_status_code');
            $table->dropColumn('latest_status_id');
        });
    }
}
