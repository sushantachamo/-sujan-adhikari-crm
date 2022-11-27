<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $allFields  = config('fields.other_details');
        Schema::create('other_details', function (Blueprint $table) use ($allFields) {
            $table->id();
            $table->integer('application_id')->unsigned();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_details');
    }
}
