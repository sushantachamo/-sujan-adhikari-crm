<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $allFields  = config('fields.applicant_details');
        Schema::create('applications', function (Blueprint $table) use ($allFields) {
            $table->id();
            // $table->string('loan_type')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('office_id')->unsigned()->default('0');
            foreach($allFields as $key=> $field)
            {
                if($field['type'] == 'number')
                    $table->integer($key)->nullable();
                elseif($field['type'] == 'datetime')
                    $table->dateTime($key)->nullable();
                elseif($field['type'] == 'longText')
                    $table->longText($key)->nullable();
                else
                    $table->text($key)->nullable();
            }
            
            $table->integer('status')->unsigned()->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('applications');
    }
}
