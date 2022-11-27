<?php

namespace App\Http\Controllers\Admin;
use App\Models\ActivityLog;
use App\Models\User;
use Auth;
use App\Models\Admin\Slider;
class DashboardController extends BaseController

{

    protected $base_route = 'admin.dashboard';
    protected $view_path = 'admin.dashboard';
    protected $panel = 'Dashboard';

    public function index()
    {
        
    	$data = ['name' => Auth::user()->name];
        $data['sliders'] = [];

        return view(parent::loadDefaultDataToView($this->view_path . '.index'), compact('data'));
    }

    public function allActivityLogs()
    {
    	$data = [];
        if(!Auth::user()->hasRole('super-admin'))
        {
            $users = User::whereOffice(Auth::user()->office_id)->pluck('id');
        }
        else{
            $users = User::select('id')->pluck('id');
        }
        
    	$data['activitylogs']= ActivityLog::whereIn('user_id', $users)->where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view(parent::loadDefaultDataToView($this->view_path . '.activity_logs'), compact('data'));

    }
}
