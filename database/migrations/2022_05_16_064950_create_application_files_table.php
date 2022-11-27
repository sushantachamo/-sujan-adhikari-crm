<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Admin\Application;
use App\Models\Admin\ApplicationFiles;
class CreateApplicationFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('application_files', function (Blueprint $table) {
            $table->id();
            $table->string('application_id');
            $table->string('photo')->nullable();
            $table->string('citizenship_front')->nullable();
            $table->string('citizenship_back')->nullable();
            $table->string('signature')->nullable();

            $table->string('lalpurja')->nullable();
            $table->string('charkilla')->nullable();
            $table->string('tiro_rasid')->nullable();
            $table->string('rokka_patra')->nullable();
            $table->string('land_lander_citizenship_front')->nullable();
            $table->string('land_lander_citizenship_back')->nullable();

            $table->string('blue_book')->nullable();
            $table->string('route_permit')->nullable();

            $table->string('muddati_rasid')->nullable();
            
            $table->string('business_registration_card')->nullable();
            $table->string('share_certificate')->nullable();
            $table->string('pan_certificate')->nullable();

            $table->string('g1_citizenship_front')->nullable();
            $table->string('g1_citizenship_back')->nullable();
            $table->string('g1_photo')->nullable();
            $table->string('g2_citizenship_front')->nullable();
            $table->string('g2_citizenship_back')->nullable();
            $table->string('g2_photo')->nullable();
            $table->string('g3_citizenship_front')->nullable();
            $table->string('g3_citizenship_back')->nullable();
            $table->string('g3_photo')->nullable();
            $table->string('g4_citizenship_front')->nullable();
            $table->string('g4_citizenship_back')->nullable();
            $table->string('g4_photo')->nullable();
            $table->timestamps();
        });

        DB::beginTransaction();
        $all_records = Application::withTrashed()->get();
        $new_data = [];
        foreach($all_records as $key=>$records)
        {

            ApplicationFiles::create(['application_id'=>$records->application_id]);
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
        Schema::dropIfExists('application_files');
    }
}
