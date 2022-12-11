<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditRenewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_renews', function (Blueprint $table) {
            $table->id();
            $table->string('application_id', 50);
            $table->integer('user_id')->unsigned();
            $table->integer('office_id')->unsigned();
            $table->string('renew_amount')->nullable();
            $table->string('renew_amount_words')->nullable();
            $table->string('renew_loan_interest_rate', 100)->nullable();
            $table->string('renew_loan_period', 100)->nullable();
            $table->string('renew_loan_period_type')->nullable();
            $table->string('renew_decision_date_bs')->nullable();
            $table->dateTime('renew_decision_date')->nullable();
            $table->string('renew_payment_amount')->nullable();
            $table->string('renew_payment_amount_words')->nullable();
            $table->string('renew_payment_type')->nullable();
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
        Schema::dropIfExists('credit_renews');
    }
}
