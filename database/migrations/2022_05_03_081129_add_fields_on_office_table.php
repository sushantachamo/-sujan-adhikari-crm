<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\Office;

class AddFieldsOnOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->string('vice_president_name')->nullable()->after('manager_name');
            $table->string('secretary')->nullable()->after('vice_president_name');
            $table->string('treasurer')->nullable()->after('secretary');
            $table->string('loan_coordinator')->nullable()->after('treasurer');
            $table->string('loan_member_1')->nullable()->after('loan_coordinator');
            $table->string('loan_member_2')->nullable()->after('loan_member_1');
            $table->dateTime('expiration_date')->nullable()->after('remarks');
            $table->string('expiration_date_bs')->nullable()->after('expiration_date');
        });

        DB::beginTransaction();
        $all_records = Office::get();
        $new_data = [];
        foreach($all_records as $key=>$records)
        {
            Office::where('id', $records->id)->update(['expiration_date'=>$records->created_at->addYear()]);
        }
        DB::commit();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->dropColumn('vice_president_name');
            $table->dropColumn('secretary');
            $table->dropColumn('treasurer');
            $table->dropColumn('loan_coordinator');
            $table->dropColumn('loan_member_1');
            $table->dropColumn('loan_member_2');
            $table->dropColumn('expiration_date');
            $table->dropColumn('expiration_date_bs');
        });
    }
}
