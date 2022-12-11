<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use App\Models\Admin\Task;
Use App\Models\Admin\Lead;
Use App\Models\Admin\Application;
use App\Models\User;
use App\Models\Admin\Office;
use Carbon\Carbon;
use Pratiksh\Nepalidate\Facades\NepaliDate;
use Auth;

class CrmController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.crm';
    protected $view_path = 'admin.crm';
    protected $panel = 'crm';
    protected $image_name = null;
    protected $folder;
    protected $folder_path;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);

        $data = [];
        $tasks = Task::select('application_id')->where('status', true)->groupBy('application_id')->get();
        $taskApplicationId = [];
        foreach($tasks as $task) {
            $taskApplicationId[] = $task->application_id;
        }
        $data['leadToday'] = Lead::whereNotIn('application_id', $taskApplicationId)->WhereDate('leads.follow_up_at_bs', NepaliDate::create(\Carbon\Carbon::now())->toBS());
        
        $data['leadThisweek'] = Lead::whereNotIn('application_id', $taskApplicationId)->whereBetween('leads.follow_up_at_bs', [NepaliDate::create(\Carbon\Carbon::now()->startOfWeek())->toBS(), NepaliDate::create(\Carbon\Carbon::now()->endOfWeek())->toBS()]);

        $data['today'] = Task::WhereDate('tasks.follow_up_at_bs', NepaliDate::create(\Carbon\Carbon::now())->toBS());
        $data['thisweek'] = Task::whereBetween('tasks.follow_up_at_bs', [NepaliDate::create(\Carbon\Carbon::now()->startOfWeek())->toBS(), NepaliDate::create(\Carbon\Carbon::now()->endOfWeek())->toBS()]);
        
        $month = explode("-",NepaliDate::create(\Carbon\Carbon::now())->toBS());
        $data['currentmonth'] = Task::whereMonth('tasks.follow_up_at_bs', $month[1]);

        $data['leadCurrentmonth'] = Lead::whereNotIn('application_id', $taskApplicationId)->whereMonth('leads.follow_up_at_bs', $month[1]);
        
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['today'] = $data['today']->where('tasks.user_id', Auth::user()->id);
            $data['thisweek'] = $data['thisweek']->where('tasks.user_id', Auth::user()->id);
            $data['currentmonth'] = $data['currentmonth']->where('tasks.user_id', Auth::user()->id);

            $data['leadToday'] = $data['leadToday']->where('leads.user_id', Auth::user()->id);
            $data['leadThisweek'] = $data['leadThisweek']->where('leads.user_id', Auth::user()->id);
            $data['leadCurrentmonth'] = $data['leadCurrentmonth']->where('leads.user_id', Auth::user()->id);
        }

        $leadResult = Lead::select('application_id')->where('status', true)->get();
        $leadResultArray = [];

        foreach ($leadResult as $key => $value) {
            array_push($leadResultArray, $value->application_id);
        }

        $data['today'] = $data['today']->where('status', true)->whereIn('application_id', $leadResultArray);
        $data['thisweek'] = $data['thisweek']->where('status', true)->whereIn('application_id', $leadResultArray);
        $data['currentmonth'] = $data['currentmonth']->where('status', true)->whereIn('application_id', $leadResultArray);

        $data['today'] = $data['today']->where('tasks.order', true)->get();
        $data['thisweek'] = $data['thisweek']->where('tasks.order', true)->get();
        $data['currentmonth'] = $data['currentmonth']->where('tasks.order', true)->get();

        $data['leadToday'] = $data['leadToday']->get();
        $data['leadThisweek'] = $data['leadThisweek']->get();
        $data['leadCurrentmonth'] = $data['leadCurrentmonth']->get();

        return view(parent::loadDefaultDataToView($this->view_path.'.dashboard'), compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function reportGenerate(Request $request)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        $startDate = $request->only('searchStartDate');
        $endDate = $request->only('searchEndDate');
        $applicationId = $request->only('application_id') != NULl ? $request->only('application_id') : NUll;
        $userId = $request->only('user_id') != NULl ? $request->only('user_id') : NUll;
        $branchId = $request->only('branch_id') != NULl ? $request->only('branch_id') : NULL;


        $data['per_page'] = $request->per_page ? $request->per_page : 25;

        $data['rows'] = Task::where('status', true)
            ->join('guarantor_details', 'guarantor_details.application_id', 'tasks.application_id');
        
        if(!empty($startDate['searchStartDate']) && !empty($endDate['searchEndDate'])) {
            $data['rows'] = $data['rows']->whereBetween('tasks.follow_up_at', [$startDate['searchStartDate'], $endDate['searchEndDate']]);
            
        }
        else if(!empty($startDate['searchStartDate'])) {
            $data['rows'] = $data['rows']->where('tasks.follow_up_at', '>=', $startDate['searchStartDate']);
        }
        else if(!empty($endDate['searchEndDate'])){
            $data['rows'] = $data['rows']->where('tasks.follow_up_at', '>=', $endDate['searchEndDate']);
        }

        if(!empty($userId['user_id'])) {
            $data['rows'] = $data['rows']->whereIn('tasks.user_id', $userId['user_id']);
        }

        if(!empty($applicationId['application_id'])) {
            $data['rows'] = $data['rows']->whereIn('tasks.application_id', $applicationId['application_id']);
        }

        if(!empty($branchId['branch_id'])) {
            $data['rows'] = $data['rows']->whereIn('tasks.office_id', $branchId['branch_id']);
        }
        
        $data['request'] = $request->all();

        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->where('user_id', Auth::user()->id);
        }

        if($data['per_page'] == -1) {
            $data['per_page']  = "All";
            $data['rows'] = $data['rows']->orderBy('created_at', 'DESC')->get();
        } else {
            $data['rows'] = $data['rows']->orderBy('created_at', 'DESC')->paginate($data['per_page']);
        }
        

        if(!empty($branchId['branch_id']) && !empty($userId['user_id']) && !empty($applicationId['application_id'])) {
            $data['rows'] = $data['rows']->groupBy(['user_id', 'application_id', 'office_id']);
        } 
        else if(!empty($branchId['branch_id']) && !empty($userId['user_id'])) {
            $data['rows'] = $data['rows']->groupBy(['user_id', 'office_id']);
        } 
        else if(!empty($branchId['branch_id']) && !empty($applicationId['application_id'])) {
            $data['rows'] = $data['rows']->groupBy(['office_id', 'application_id']);
        }
        else if(!empty($userId['user_id']) && !empty($applicationId['application_id'])) {
            $data['rows'] = $data['rows']->groupBy(['user_id', 'application_id']);
        }
        else if(!empty($branchId['branch_id'])) {
            $data['rows'] = $data['rows']->groupBy(['office_id']);
        }
        else if(!empty($userId['user_id'])) {
            $data['rows'] = $data['rows']->groupBy(['user_id']);
        }
        else if(!empty($applicationId['application_id'])) {
            $data['rows'] = $data['rows']->groupBy(['application_id']);
        }

        $result = Application::select('applications.application_id', 'applications.borrower_name', 'applications.borrower_name_en','applications.contact_number', 'applications.loan_type')->get();
        
        $data['applications'] = [
            "" => "SELECT"
        ];

        foreach ($result as $key => $value) {
            $array = [
                $value->application_id => $value->borrower_name.' /'.$value->borrower_name_en.' / ( '.$value->application_id. ' - '.$value->loan_type.')'
            ];
            $data['applications'] = $data['applications']+ $array;
        }

        $result = User::select('users.id', 'users.name')->get();

        $data['users'] = [
            "" => "SELECT"
        ];

        foreach ($result as $key => $value) {
            $array = [
                $value->id => $value->name
            ];
            $data['users'] = $data['users']+ $array;
        }

        $result = Office::select('offices.id', 'offices.name_en', 'offices.name_np')->where('status', 1);

        // if(!Auth::user()->hasRole('super-admin'))
        // {
        //     $result = $result->where('office_id', Auth::user()->office_id);
        // }

        $result = $result->get();

        $data['offices'] = [
            "" => "SELECT"
        ];

        foreach ($result as $key => $value) {
            $array = [
                $value->id => $value->name_en.' /'.$value->name_np
            ];
            $data['offices'] = $data['offices']+ $array;
        }
        
        return view(parent::loadDefaultDataToView($this->view_path.'.report-generate'), compact('data'));
    }
}
