<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\Task;
use App\Models\Admin\Lead;
use App\Models\Admin\Application;
use App\Http\Requests\Admin\Task\TaskCreateRequest;
use App\Http\Requests\Admin\Task\TaskUpdateRequest;
use App\Http\Requests\Admin\Task\TaskPostpondRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;
use App\Models\ActivityLog;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\Storage;
use App\Libraries\HelperClass\ViewHelper;
use Carbon\Carbon;
use Krishnahimself\DateConverter\DateConverter;

class TaskController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.task-activity';
    protected $view_path = 'admin.crm.task';
    protected $panel = 'Task';
    protected $image_name = null;
    protected $folder;
    protected $folder_path;

    public function __construct(Task $task)
    {
         $this->model = $task;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        $data = [];
        $data['per_page'] = $request->per_page ? $request->per_page : 10;
        $data['rows'] = $this->model->newQuery();
        
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->where('user_id', Auth::user()->id);
        }

        if(isset($request->search)) {
            $result = DB::table('applications')->select('application_id')->where('borrower_name_en', 'like', '%'.$request->search.'%')->get();
            $resultArray = [];

            foreach ($result as $key => $value) {
                array_push($resultArray, $value->application_id);
            }
            $data['rows'] = $data['rows']->whereIn('application_id', $resultArray);
        }

        $data['rows'] = $data['rows']->where('status', true)->orderby('created_at', 'desc')->paginate($data['per_page']);
        $data['request'] = $request->all();
        $data['task'] = $data['rows']->groupBy('application_id');

        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);

        $result = [];

        $result['customerDetails'] = Lead::join('applications', 'applications.application_id', 'leads.application_id')->where('leads.status' , true);
        if(!Auth::user()->hasRole('super-admin'))
        {
            $result['customerDetails'] = $result['customerDetails']->where('leads.user_id', Auth::user()->id);
        }
        $result['customerDetails'] = $result['customerDetails']->get();

        $taskType = [
            "" => "N/A",
            "sms" => "SMS",
            "phone" => "PHONE",
            "email" => "Email",
            "onsite-visit" => "Onsite VIsit",
        ];
        $data = [
            "" => "SELECT"
        ];

        foreach ($result['customerDetails'] as $key => $value) {
            $array = [
                $value->application_id => $value->borrower_name.' /'.$value->borrower_name_en.' / ( '.$value->application_id. ' - '.$value->loan_type.')'
            ];
            $data = $data + $array;
        }

        return view(parent::loadDefaultDataToView($this->view_path.'.create'), compact('data', 'taskType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createById($id)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);

        $data = [];
        $data['row'] = $this->model->select('id', 'application_id')->where('id', $id);

        $data['row'] = $data['row']->first();

        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        $data['activityLog'] = ActivityLog::where('panel_id', $data['row']['application_id'])->where('panel', 'task')->orderBy('created_at', 'DESC')->get();

        $result = User::where('status', '=', 1 )->get();
        $taskType = [
            "" => "N/A",
            "sms" => "SMS",
            "phone" => "PHONE",
            "email" => "Email",
            "onsite-visit" => "Onsite VIsit",
        ];
        $data['userDetails'] = [
            "" => "SELECT"
        ];
        foreach ($result as $key => $value) {
            $array = [
                $value->id => $value->name
            ];

            $data['userDetails'] = $data['userDetails'] + $array;
        }


        return view(parent::loadDefaultDataToView($this->view_path.'.createById'), compact('data', 'taskType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskCreateRequest $taskCreateRequest
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCreateRequest $taskCreateRequest)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 

        $filePath = FALSE;

        $result = $this->model->where('application_id', $taskCreateRequest->get('application_id'))->get();

        if(!empty($result)) {
            $data = [
              'order' => false  
            ];
            Task::where('application_id', $taskCreateRequest->get('application_id'))->update($data);
        }

        if ($taskCreateRequest->hasFile('document')) {
            $filePath = Storage::disk('local')->putFile('task-activity', $taskCreateRequest->file('document'));
            
            if(!$filePath) {
                return __('Image cannot be upload!!');
            }
        }

        $task_data = $this->model->create([
            'application_id' => $taskCreateRequest->get('application_id'),
            'type' => $taskCreateRequest->get('type'),
            'details' => $taskCreateRequest->get('details'),
            'type1' => $taskCreateRequest->get('type1'),
            'details1' => $taskCreateRequest->get('details1'),
            'type2' => $taskCreateRequest->get('type2'),
            'details2' => $taskCreateRequest->get('details2'),
            'type3' => $taskCreateRequest->get('type3'),
            'details3' => $taskCreateRequest->get('details3'),
            'type4' => $taskCreateRequest->get('type4'),
            'details4' => $taskCreateRequest->get('details4'),
            'description' => $taskCreateRequest->get('description'),
            'number_of_dues' => $taskCreateRequest->get('number_of_dues'),
            'due_principal_amount' => $taskCreateRequest->get('principal_amount'),
            'due_interest_amount' => $taskCreateRequest->get('interest_amount'),
            'follow_up_at_bs' => $taskCreateRequest->get('follow_up_at_bs'),
            'follow_up_at' => $taskCreateRequest->get('follow_up_at'),
            'document' => $filePath,
            'created_by' => Auth::user()->id,
            'office_id' => Auth::user()->office_id,
            'order' => true,
            'user_id' => $taskCreateRequest->get('user_id') == null ? Auth::user()->id: $taskCreateRequest->get('user_id'),
        ]);
        $customerDetails = '';
        $guarantorDetails1 = '';
        $guarantorDetails2 = '';
        $guarantorDetails3 = '';
        $guarantorDetails4 = '';
        $description = $taskCreateRequest->get('description');

        if($taskCreateRequest->get('type')) {
            $customerDetails = $taskCreateRequest->get('type').' to '. $taskCreateRequest->get('details'). ' <br>';
        }

        if($taskCreateRequest->get('type1')) {
            $guarantorDetails1 = $taskCreateRequest->get('type1').' to '. $taskCreateRequest->get('details1'). ' <br>';
        }

        if($taskCreateRequest->get('type2')) {
            $guarantorDetails2 = $taskCreateRequest->get('type2').' to '. $taskCreateRequest->get('details2'). ' <br>';
        }

        if($taskCreateRequest->get('type3')) {
            $guarantorDetails3 = $taskCreateRequest->get('type3').' to '. $taskCreateRequest->get('details3'). ' <br>';
        }

        if($taskCreateRequest->get('type4')) {
            $guarantorDetails4 = $taskCreateRequest->get('type4').' to '. $taskCreateRequest->get('details4'). ' <br>';
        }

        $year= Carbon::now()->format('Y');
        $month= Carbon::now()->format('m');
        $day= Carbon::now()->format('d');
        $nepaliDate = DateConverter::fromEnglishDate($year, $month, $day)->toNepaliDate();

        $message = 'user has created on '.$nepaliDate. '<br>' . $customerDetails . $guarantorDetails1 . $guarantorDetails2 . $guarantorDetails3 . $guarantorDetails4 . 'Details : '. $description;

        if(config('custom.activity_log') == true) {
            ActivityLog::makeActivity($message, $this->panel, $task_data->application_id, 'created');
        }
            
        DB::commit();

        $taskCreateRequest->session()->flash('success_message', $this->panel . ' added successfully.');
        return parent::redirectRequest($taskCreateRequest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);

        $data = [];
        $data['row'] = $this->model->where('id', $id);

        $data['row'] = $data['row']->first();

        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        $data['activityLog'] = ActivityLog::where('panel_id', $data['row']['application_id'])->where('panel', 'task')->orderBy('created_at', 'DESC')->get();

        $result = User::where('status', '=', 1 )->get();
        $taskType = [
            "" => "N/A",
            "sms" => "SMS",
            "phone" => "PHONE",
            "email" => "Email",
            "onsite-visit" => "Onsite VIsit",
        ];
        $data['userDetails'] = [
            "" => "SELECT"
        ];
        foreach ($result as $key => $value) {
            $array = [
                $value->id => $value->name
            ];

            $data['userDetails'] = $data['userDetails'] + $array;
        }

        return view(parent::loadDefaultDataToView($this->view_path.'.edit'), compact('data', 'taskType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $taskUpdateRequest, $id)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 
        $data = [];
       
        $data['row'] =  $this->model->where('id', $id);

        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        $filePath = FALSE;
        if ($taskUpdateRequest->hasFile('document')) {
            $filePath = Storage::disk('public')->putFile('task-activity', $taskUpdateRequest->file('document'));
            
            if(!$filePath) {
                return __('Image cannot be upload!!');
            }
        }

        $update_data = [
            'type' => $taskUpdateRequest->get('type'),
            'details' => $taskUpdateRequest->get('details'),
            'type1' => $taskUpdateRequest->get('type1'),
            'details1' => $taskUpdateRequest->get('details1'),
            'type2' => $taskUpdateRequest->get('type2'),
            'details2' => $taskUpdateRequest->get('details2'),
            'type3' => $taskUpdateRequest->get('type3'),
            'details3' => $taskUpdateRequest->get('details3'),
            'type4' => $taskUpdateRequest->get('type4'),
            'details4' => $taskUpdateRequest->get('details4'),
            'description' => $taskUpdateRequest->get('description'),
            'number_of_dues' => $taskUpdateRequest->get('number_of_dues'),
            'due_principal_amount' => $taskUpdateRequest->get('principal_amount'),
            'due_interest_amount' => $taskUpdateRequest->get('interest_amount'),
            'follow_up_at_bs' => $taskUpdateRequest->get('follow_up_at_bs'),
            'follow_up_at' => $taskUpdateRequest->get('follow_up_at'),
            'document' => $filePath,
            'updated_by' => Auth::user()->id,
            'user_id' => $taskUpdateRequest->get('user_id') == null ? Auth::user()->id: $taskUpdateRequest->get('user_id'),
        ];

        $this->model->find($id)->update($update_data);

        $customerDetails = '';
        $guarantorDetails1 = '';
        $guarantorDetails2 = '';
        $guarantorDetails3 = '';
        $guarantorDetails4 = '';
        $description = $taskUpdateRequest->get('description');

        if($taskUpdateRequest->get('type')) {
            $customerDetails = $taskUpdateRequest->get('type').' to '. $taskUpdateRequest->get('details'). ' <br>';
        }

        if($taskUpdateRequest->get('type1')) {
            $guarantorDetails1 = $taskUpdateRequest->get('type1').' to '. $taskUpdateRequest->get('details1'). ' <br>';
        }

        if($taskUpdateRequest->get('type2')) {
            $guarantorDetails2 = $taskUpdateRequest->get('type2').' to '. $taskUpdateRequest->get('details2'). ' <br>';
        }

        if($taskUpdateRequest->get('type3')) {
            $guarantorDetails3 = $taskUpdateRequest->get('type3').' to '. $taskUpdateRequest->get('details3'). ' <br>';
        }

        if($taskUpdateRequest->get('type4')) {
            $guarantorDetails4 = $taskUpdateRequest->get('type4').' to '. $taskUpdateRequest->get('details4'). ' <br>';
        }

        $year= Carbon::now()->format('Y');
        $month= Carbon::now()->format('m');
        $day= Carbon::now()->format('d');
        $nepaliDate = DateConverter::fromEnglishDate($year, $month, $day)->toNepaliDate();

        $message = 'user has created on '.$nepaliDate. '<br>' . $customerDetails . $guarantorDetails1 . $guarantorDetails2 . $guarantorDetails3 . $guarantorDetails4 . 'Details : '. $description;

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity($message, $this->panel, $taskUpdateRequest->application_id, 'updated');
        DB::commit();

        $taskUpdateRequest->session()->flash('success_message', $this->panel . ' updated successfully.');
        return parent::redirectRequest($taskUpdateRequest, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postpond(Request $request, $id)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);

        $data = [];
        $data['row'] = $this->model->where('id', $id);

        $data['row'] = $data['row']->first();

        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        $result = User::where('status', '=', 1 )->get();
        $data['userDetails'] = [
            "" => "SELECT"
        ];
        foreach ($result as $key => $value) {
            $array = [
                $value->id => $value->name
            ];

            $data['userDetails'] = $data['userDetails'] + $array;
        }

        return view(parent::loadDefaultDataToView($this->view_path.'.postpond'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PostpondAction(TaskPostpondRequest $taskPostpondRequest, $id)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 
        $data = [];
       
        $data['row'] =  $this->model->where('id', $id);

        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        $update_data = [
            
            'follow_up_at_bs' => $taskPostpondRequest->get('follow_up_at_bs'),
            'follow_up_at' => $taskPostpondRequest->get('follow_up_at'),
            'updated_by' => Auth::user()->id,
            'user_id' => $taskPostpondRequest->get('user_id') == null ? Auth::user()->id: $taskPostpondRequest->get('user_id'),
        ];

        $this->model->find($id)->update($update_data);


        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('update a '.$this->panel .' <a href="' . route($this->base_route . '.show', $id) . '">' . $id . '</a>', $this->panel, $id, 'updated');
        DB::commit();

        $taskPostpondRequest->session()->flash('success_message', $this->panel . ' updated successfully.');
        return parent::redirectRequest($taskPostpondRequest, $id);
    }

}
