<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDartaChalanisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('darta_chalanis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('office_id')->unsigned();
            $table->string('record_id')->unique();
            $table->string('record_type')->nullable();
            $table->string('register_number')->nullable();
            $table->string('fiscal_year')->nullable();
            $table->dateTime('registered_at')->nullable();
            $table->longText('subject')->nullable();
            $table->text('office_or_person')->nullable();
            $table->string('filename')->nullable();
            $table->text('identity_person')->nullable();
            $table->string('status')->nullable();
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('darta_chalanis');
    }
}
