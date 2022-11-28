<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Application;
use App\Models\Admin\GuarantorDetails;
use App\Models\Admin\LoanDetails;
use App\Models\Admin\Lead;
use App\Models\Admin\DartaChalani;
use App\Models\ActivityLog;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper as Helper;
use Illuminate\Support\Facades\Storage;
use App\Libraries\HelperClass\ViewHelper;
use App\Models\User;
use Auth;

use App\Http\Requests\Admin\Lead\LeadCreateRequest;
use App\Http\Requests\Admin\Lead\LeadUpdateRequest;

class LeadController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.lead';
    protected $view_path = 'admin.crm.lead';
    protected $panel = 'lead';
    protected $image_name = null;
    protected $folder;
    protected $folder_path;

    public function __construct(Lead $lead)
    {
         $this->model = $lead;
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

        $data['rows'] = $data['rows']->where('status', true)->orderby('created_at', 'desc')->paginate($data['per_page']);
        $data['request'] = $request->all();

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
        $result['customerDetails'] = Application::select('applications.application_id', 'applications.borrower_name', 'applications.borrower_name_en','applications.contact_number', 'applications.loan_type');
            
        if(!Auth::user()->hasRole('super-admin'))
        {
            $result['customerDetails'] = $result['customerDetails']->whereOffice(Auth::user()->office_id);
        }

        $result['customerDetails'] = $result['customerDetails']->orderby('created_at', 'desc')->get();
        $data = [
            "" => "SELECT"
        ];
        foreach ($result['customerDetails'] as $key => $value) {
            $array = [
                $value->application_id => $value->borrower_name.' /'.$value->borrower_name_en.' / ( '.$value->application_id. ' - '.$value->loan_type.')'
            ];

            $data = $data + $array;
        }


        return view(parent::loadDefaultDataToView($this->view_path.'.create'), compact('data'));
    }

    public function getApplicationDetailsById($id)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);

        $data = [];
        $data['customerDetails'] = Application::select('applications.application_id','applications.id', 'applications.borrower_name', 'applications.borrower_name_en','applications.contact_number', 'applications.b_p_localgovt')->where('application_id','=',$id);

        $data['guarantorDetails'] = GuarantorDetails::where('application_id', '=', $id)->first();
        $data['loanDetails'] = LoanDetails::where('application_id', '=', $id)->first();
        $data['userDetails'] = User::where('status', '=', 1 )->get();
        $data['leadDetails'] = $this->model->where('application_id', '=', $id)->first();
            
        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['customerDetails'] = $data['customerDetails']->whereOffice(Auth::user()->office_id);
        }

        $data['customerDetails'] = $data['customerDetails']->first();
        
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LeadCreateRequest $leadCreateRequest
     * @return \Illuminate\Http\Response
     */
    public function store(LeadCreateRequest $leadCreateRequest)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 
        
        $lead_data = $this->model->create([
            'application_id' => $leadCreateRequest->get('application_id'),
            'loan_account_number' => $leadCreateRequest->get('loan_account_number'),
            'follow_up_at_bs' => $leadCreateRequest->get('follow_up_at_bs'),
            'follow_up_at' => $leadCreateRequest->get('follow_up_at'),
            'user_id' => $leadCreateRequest->get('user_id') == null ? Auth::user()->id: $leadCreateRequest->get('user_id'),
        ]);

        if(config('custom.activity_log') == true) {
            ActivityLog::makeActivity('Add a new lead :'.$this->panel .' <a href="' . route($this->base_route . '.show', $lead_data->id) . '">' . $lead_data->id . '</a>', $this->panel, $lead_data->id, 'created');
        }
            
        DB::commit();

        $leadCreateRequest->session()->flash('success_message', $this->panel . ' added successfully.');
        return parent::redirectRequest($leadCreateRequest);
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

        if(!Auth::user()->hasRole('super-admin'))
        {
            $data['row'] = $data['row']->where('user_id', Auth::user()->office_id);
            
        }
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

        return view(parent::loadDefaultDataToView($this->view_path.'.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeadUpdateRequest $leadUpdateRequest, $id)
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
            'loan_account_number' => $leadUpdateRequest->get('loan_account_number'),
            'follow_up_at_bs' => $leadUpdateRequest->get('follow_up_at_bs'),
            'follow_up_at' => $leadUpdateRequest->get('follow_up_at'),
            'user_id' => $leadUpdateRequest->get('user_id') == null ? Auth::user()->id: $leadUpdateRequest->get('user_id'),
        ];

        $this->model->find($id)->update($update_data);


        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('update a '.$this->panel .' <a href="' . route($this->base_route . '.show', $id) . '">' . $id . '</a>', $this->panel, $id, 'updated');
        DB::commit();

        $leadUpdateRequest->session()->flash('success_message', $this->panel . ' updated successfully.');
        return parent::redirectRequest($leadUpdateRequest, $id);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function delete($row)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);
        if (!$row) {
            return false;
        }
        $row->delete();
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);
        $this->model->where('id', $id)->delete();

        return redirect()->back()->with('success_message', $this->panel . ' delete successfully.');
    }
}
