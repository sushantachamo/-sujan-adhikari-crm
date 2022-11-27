<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->nullable();
            $table->string('name_en', 100)->nullable();
            $table->string('name_np', 100)->nullable();
            $table->integer('province')->nullable();
            $table->integer('district')->nullable();
            $table->integer('localgovt')->nullable();
            $table->string('ward', 100)->nullable();
            $table->string('tole', 100)->nullable();
            $table->string('phone')->nullable();
            $table->string('president_name')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('email',100)->nullable();
            $table->string('remarks', 250)->nullable();
            $table->string('status')->default(0);
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('offices');
    }
}
