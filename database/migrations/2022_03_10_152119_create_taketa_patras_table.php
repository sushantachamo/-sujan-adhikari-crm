<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaketaPatrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taketa_patras', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('office_id')->unsigned();
            $table->string('capital')->nullable();
            $table->string('interest', 100)->nullable();
            $table->string('total', 100)->nullable();
            $table->string('letter_type')->nullable();
            $table->string('last_installment_date_bs')->nullable();
            $table->dateTime('last_installment_date')->nullable();
            $table->string('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taketa_patras');
    }
}
