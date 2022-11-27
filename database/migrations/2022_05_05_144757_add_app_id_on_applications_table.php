<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin\Application;
use App\Models\Admin\TaketaPatra;
use App\Models\Admin\CreditAnalysis;

use App\Models\Admin\LoanDetails;
use App\Models\Admin\GuarantorDetails;
use App\Models\Admin\SanchiDetails;
use App\Models\Admin\OtherDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AddAppIdOnApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->string('application_id', 50)->after('id');
        });
        
        Schema::table('guarantor_details', function ($table) {
            $table->string('application_id', 50)->change();
        });
        Schema::table('loan_details', function ($table) {
            $table->string('application_id', 50)->change();
        });
        Schema::table('sanchi_details', function ($table) {
            $table->string('application_id', 50)->change();
        });
        Schema::table('other_details', function ($table) {
            $table->string('application_id', 50)->change();
        });

        DB::beginTransaction();
        $all_records = Application::withTrashed()->get();
        $new_data = [];
        foreach($all_records as $key=>$records)
        {
            generate_application_id:
            $application_id = 'L'.Carbon::parse($records['b_dob'])->format('myd').'-'.substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", 6)), 0, 6);
            $check_old_application = Application::where('application_id', $application_id)->get();

            if( $check_old_application->first() != null )
            {
                goto  generate_application_id;
            }

            Application::withTrashed()->where('id', $records->id)->update(['application_id'=>(string)$application_id]);
            LoanDetails::where('application_id', (string)$records->id)->update(['application_id'=> $application_id]);
            GuarantorDetails::where('application_id', (string)$records->id)->update(['application_id'=>$application_id]);
            SanchiDetails::where('application_id', (string)$records->id)->update(['application_id'=>$application_id]);
            OtherDetails::where('application_id', (string)$records->id)->update(['application_id'=>$application_id]);  
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
        DB::beginTransaction();
        $all_records = Application::get();
        $new_data = [];
        foreach($all_records as $key=>$records)
        {

            LoanDetails::where('application_id', $records->application_id)->update(['application_id'=>$records->id]);
            GuarantorDetails::where('application_id', $records->application_id)->update(['application_id'=>$records->id]);
            SanchiDetails::where('application_id', $records->application_id)->update(['application_id'=>$records->id]);
            OtherDetails::where('application_id', $records->application_id)->update(['application_id'=>$records->id]);
            
        }
        DB::commit();

        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn('application_id');
        });
    }
}
