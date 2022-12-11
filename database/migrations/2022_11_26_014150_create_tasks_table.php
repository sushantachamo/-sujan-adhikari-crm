<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('application_id');
            $table->integer('user_id')->unsigned();
            $table->string('type')->nullable();
            $table->text('details')->nullable();
            $table->string('type1')->nullable();
            $table->text('details1')->nullable();
            $table->string('type2')->nullable();
            $table->text('details2')->nullable();
            $table->string('type3')->nullable();
            $table->text('details3')->nullable();
            $table->string('type4')->nullable();
            $table->text('details4')->nullable();
            $table->text('description');
            $table->bigInteger('number_of_dues')->nullable();
            $table->bigInteger('due_principal_amount')->nullable();
            $table->bigInteger('due_interest_amount')->nullable();
            $table->date('follow_up_at_bs');
            $table->date('follow_up_at');
            $table->string('document')->nullable();
            $table->boolean('status')->default(true);
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
