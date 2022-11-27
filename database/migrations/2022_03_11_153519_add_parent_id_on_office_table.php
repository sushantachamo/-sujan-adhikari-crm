<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdOnOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->dateTime('registration_date')->nullable()->after('registration_number');
            $table->string('registration_date_bs')->nullable()->after('registration_date');
            $table->string('former_address')->nullable()->after('tole');
            $table->integer('head_office')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->dropColumn('registration_date');
            $table->dropColumn('registration_date_bs');
            $table->dropColumn('former_address');
            $table->dropColumn('head_office');
        });
    }
}
