<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use App\Models\Admin\Task;
Use App\Models\Admin\Application;
use App\Models\User;

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


        return view(parent::loadDefaultDataToView($this->view_path.'.dashboard'), );

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function reportGenerate(Request $request)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        $searchParm  = $request->only('searchDate', 'application_id', 'user_id');
        // $searchDate = $searchParm->searchDate;
        $applicationId = $searchParm['application_id'];
        $userId = $searchParm['user_id'];

        $data['per_page'] = $request->per_page ? $request->per_page : 10;
        $data['rows'] = Task::where('status', true)
            ->leftjoin('guarantor_details', 'guarantor_details.application_id', 'tasks.application_id')
            ->paginate($data['per_page']);

        if(!empty($userId)) {
            $data['rows'] = $data['rows']->where('user_id', '=', $userId);
        }

        if(!empty($applicationId)) {
            $data['rows'] = $data['rows']->where('application_id', '=', $applicationId);
        }
        $data['request'] = $request->all();
        $data['rows'] = $data['rows']->groupBy('user_id');
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

        return view(parent::loadDefaultDataToView($this->view_path.'.report-generate'), compact('data'));

    }
}
