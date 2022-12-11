<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Application;
use App\Models\Admin\ApplicationStatus;
use Illuminate\Support\Facades\DB;

class applicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $check_status = ApplicationStatus::count();
        if($check_status == 0)
        {
            DB::beginTransaction(); 
            $all_applications = Application::LeftJoin('other_details', 'other_details.application_id','=','applications.application_id')->withTrashed()->get();

            foreach($all_applications as $application)
            {
                $new_status = [
                    'application_id' => $application->application_id,
                    'status_code'  => 'new',
                    'comment' => ' नयाँ ऋण आवेदन ।',
                    'user_id' => $application->user_id,
                    'user_name' => $application->User()->first()->name,  
                    'created_at' =>$application->created_at,
                    'updated_at' =>$application->created_at,
                ];

                $latest = ApplicationStatus::create($new_status);

                if($application->reviewed_by !=null)
                {

                    $review_status = [
                        'application_id' => $application->application_id,
                        'status_code'  => 'reviewed',
                        'comment' => 'ऋण आवेदन जाँच भएको छ।',
                        'user_id' => $application->user_id,
                        'user_name' => $application->reviewed_by,  
                        'created_at' =>$application->updated_at,
                        'updated_at' =>$application->updated_at,
                    ];
                    $latest = ApplicationStatus::create($review_status);
                }
                if($application->approved_by !=null)
                {
                    $approve_status = [
                        'application_id' => $application->application_id,
                        'status_code'  => 'approved',
                        'comment' => 'ऋण आवेदन प्रमाणीत भएको छ।',
                        'user_id' => $application->user_id,
                        'user_name' => $application->approved_by, 
                        'created_at' =>$application->updated_at,
                        'updated_at' =>$application->updated_at, 
                    ];
                    $latest = ApplicationStatus::create($approve_status);
                }
                $application = Application::withTrashed()->where('application_id', $application->application_id)->update([
                        'latest_status_id'=> $latest->id,
                        'latest_status_code'=> $latest->status_code
                    ]);
            }
            DB::commit();
        }

        else
        {
            DB::rollBack();
            dd('Invalid Request : There have already some statuses');
        }

    }
}
