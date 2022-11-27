<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Office\AddFormValidation;
use App\Http\Requests\Admin\Office\EditFormValidation;
use App\Models\ActivityLog;
use App\Models\Admin\Office;
use App\Models\Address\District;
use App\Models\Address\Province;
use App\Models\Address\LocalGovt;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Str;
use App\Helpers\Helper as Helper;

class OfficeController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.office';
    protected $view_path = 'admin.office';
    protected $panel = 'Offices';
    protected $image_name = null;
    protected $folder;
    protected $folder_path;

    public function __construct(Office $office)
    {
        $this->model =$office;
        $this->folder = config('myPath.assets.panel_image_folders.office');
        $this->folder_path = public_path('images'.DIRECTORY_SEPARATOR.$this->folder);
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
            $data['per_page'] = $request->per_page ? $request->per_page : 15;
            $data['rows'] = $this->model;
            if ($request->get('data-show') == 'trashed') {
                $data['rows'] = $data['rows']->onlyTrashed();
                $data['is_trash'] = true;
            }
            else 
            {
                $data['rows'] = $data['rows']->where(function ($query) use ($request) {
                    if ($request->has('filter_name') && $request->get('filter_name')) {
                        $query->Where('name_en', 'like', '%' . $request->get('filter_name') . '%');
                        $query->OrWhere('name_np', 'like', '%' . $request->get('filter_name') . '%');
                    }
                    if ($request->has('filter_agent_name') && $request->get('filter_agent_name')) {
                        $query->Where('agent_name', 'like', '%' . $request->get('filter_agent_name') . '%');
                    }
                    if ($request->has('filter_address_np') && $request->get('filter_address_np')) {
                        $query->Where('address_np', 'like', '%' . $request->get('filter_address_np') . '%');
                    }
                    if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                        $query->where('created_at', 'like', $request->get('filter_created_at') . '%');
                    }
                    if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                        $query->where('status', $request->get('filter_status') == 'active' ? 1 : 0);
                    }
                });
                $data['is_trash'] = false;
            }
            $data['rows'] = $data['rows']->orderby('created_at', 'desc')->paginate($data['per_page']);

            $data['request'] = $request->all();
            

            // dd(\DB::getQueryLog());

            return view(parent::loadDefaultDataToView($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        $data = [];
        $provinceArray = ['province'=> 'district'];

        $districtsArray =['district'=> 'localgovt'];

        foreach($provinceArray as $province => $district)
        {
            if($request->old($province))
            $data[$district.'s'] = ['' => '-- छान्नुहोस् --'] +District::select('id', 'name_np')->where('province_id', $request->old($province))->orderBy('id')->pluck('name_np', 'id')->toArray();
        }

        foreach($districtsArray as $district=>$local_govt)
        {
            if($request->old($district))
            $data[$local_govt.'s'] = ['' => '-- छान्नुहोस् --'] +LocalGovt::select('id', 'name_np')->where('district_id', $request->old($district))->orderBy('id')->pluck('name_np', 'id')->toArray();
        }

        $data['provinces'] = ['' => '-- छान्नुहोस् --'] +Province::select('id', 'name_np')->orderBy('id')->pluck('name_np', 'id')->toArray();
        $data['head_offices'] = ['' => '-- छान्नुहोस् --'] + Office::where('status', 1)->where('head_office', null)->pluck('name_np', 'id')->toArray();

        $data['agent_names'] = Office::where('status', 1)->where('head_office', null)->distinct('agent_name')->pluck('agent_name', 'agent_name')->toArray();
        return view(parent::loadDefaultDataToView($this->view_path.'.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFormValidation $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        DB::beginTransaction(); 

        $file = $request->file('image');
        if($file){
            $file_size = $file->getSize();
            $upload_max_filesize_kilobytes = Helper::parse_size(config('custom.filesize'));
            $upload_max_filesize_bytes     = $upload_max_filesize_kilobytes * 1024 ;

            if ($file_size < $upload_max_filesize_bytes && $file_size != 0 && $file->isValid())
            {
                $allowedDocExtension = config('custom.allowedDocExtension');
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedDocExtension);
                if (!$check)
                {
                    $request->session()->flash('error_message', $extension . '.not allowed. The attachment must be an image.');
                    return redirect()->back()->withInput();
                }
                parent::uploadImage($request);
            }
            else
            {
                $request->session()->flash('error_message', "File upload failed. The file may not be greater than ".(int)($upload_max_filesize_kilobytes)."KB.");
                return redirect()->back()->withInput();
            }
        }

        $office = $this->model->create([
            'registration_number' => $request->get('registration_number'),
            'registration_date' => $request->get('registration_date'),
            'registration_date_bs' => $request->get('registration_date_bs'),
            'register_nikaye' => $request->get('register_nikaye'),
            'name_en' => $request->get('name_en'),
            'name_np' => $request->get('name_np'),
            'province' => $request->get('province'),
            'district' => $request->get('district'),
            'localgovt' => $request->get('localgovt'),
            'ward' => $request->get('ward'),
            'tole' => $request->get('tole'),
            'former_address' => $request->get('former_address'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'head_office' => $request->get('head_office'),
            
            'president_name' => $request->get('president_name'),
            'manager_name' => $request->get('manager_name'),
            'vice_president_name' => $request->get('vice_president_name'),
            'secretary' => $request->get('secretary'),
            'treasurer' => $request->get('treasurer'),
            'loan_coordinator' => $request->get('loan_coordinator'),
            'loan_member_1' => $request->get('loan_member_1'),
            'loan_member_2' => $request->get('loan_member_2'),

            'image' => $this->image_name,
            'slogan' => $request->get('slogan'),
            'remarks' => $request->get('remarks'),
            'agent_name' => $request->get('agent_name'),

            'expiration_date' => $request->get('expiration_date'),
            'expiration_date_bs' => $request->get('expiration_date_bs'),
            'status' => $request->get('status'),
            'user_id' => Auth::user()->id,
        ]);
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('create a new office <strong>'.$request->get('name_en').'</strong>', $this->panel, $office->id, 'created', $request);
        DB::commit();
        $request->session()->flash('success_message', $this->panel.' added successfully.');
        return parent::redirectRequest($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);


        $data = [];
        $data['row'] = $this->model->withTrashed()->find($id);
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        $data['activitylogs'] = ActivityLog::where('panel', $this->panel)->where('panel_id', $id)->where('status', 1)->orderBy('created_at', 'desc')->paginate(10);

        return view(parent::loadDefaultDataToView($this->view_path.'.show'), compact('data'));
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
        $data['row'] = $this->model->find($id);
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        if($data['row'])
        {
            $provinceArray = ['province'=> 'district'];
            $districtsArray =['district'=> 'localgovt'];
            foreach($provinceArray as $province => $district)
            {
                $data[$district.'s'] = ['' => '-- छान्नुहोस् --'] +District::select('id', 'name_np')->where('province_id', $data['row'][$province])->orderBy('id')->pluck('name_np', 'id')->toArray();
            }
            foreach($districtsArray as $district=>$local_govt)
            {
                $data[$local_govt.'s'] = ['' => '-- छान्नुहोस् --'] +LocalGovt::select('id', 'name_np')->where('district_id', $data['row'][$district])->orderBy('id')->pluck('name_np', 'id')->toArray();
            }
        }
        $data['provinces'] = ['' => '-- छान्नुहोस् --'] +Province::select('id', 'name_np')->orderBy('id')->pluck('name_np', 'id')->toArray();
        $data['head_offices'] = ['' => '-- छान्नुहोस् --'] + $this->model->where('status', 1)->where('id', '!=', $id)->whereNull('head_office')->pluck('name_np', 'id')->toArray();
        $data['agent_names'] = Office::where('status', 1)->where('head_office', null)->distinct('agent_name')->pluck('agent_name', 'agent_name')->toArray();

        return view(parent::loadDefaultDataToView($this->view_path.'.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFormValidation $request, $id)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);

        DB::beginTransaction(); 

        $data = [];
        $data['row'] = $this->model->find($id);
        if(!$data['row']){
            $request->session()->flash('error_message', 'Invalid Request!!');
            return redirect()->route($this->base_route.'.index');
        }
        $this->image_name = $data['row']->image;
        parent::uploadImage($request, 'update', $data['row']->image);

        $office = $data['row']->update([
            'registration_number' => $request->get('registration_number'),
            'registration_date' => $request->get('registration_date'),
            'registration_date_bs' => $request->get('registration_date_bs'),
            'register_nikaye' => $request->get('register_nikaye'),
            'name_en' => $request->get('name_en'),
            'name_np' => $request->get('name_np'),
            'province' => $request->get('province'),
            'district' => $request->get('district'),
            'localgovt' => $request->get('localgovt'),
            'ward' => $request->get('ward'),
            'tole' => $request->get('tole'),
            'former_address' => $request->get('former_address'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'head_office' => $request->get('head_office'),

            'president_name' => $request->get('president_name'),
            'manager_name' => $request->get('manager_name'),
            'vice_president_name' => $request->get('vice_president_name'),
            'secretary' => $request->get('secretary'),
            'treasurer' => $request->get('treasurer'),
            'loan_coordinator' => $request->get('loan_coordinator'),
            'loan_member_1' => $request->get('loan_member_1'),
            'loan_member_2' => $request->get('loan_member_2'),
            'slogan' => $request->get('slogan'),
            'agent_name' => $request->get('agent_name'),
            'image' => $this->image_name,
            'remarks' => $request->get('remarks'),
            'expiration_date' => $request->get('expiration_date'),
            'expiration_date_bs' => $request->get('expiration_date_bs'),
            'status' => $request->get('status'),
        ]);
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Update an office <strong>'.$request->get('name_en').'</strong>', $this->panel, $id, 'updated', $request);
        DB::commit();

        $request->session()->flash('success_message', $this->panel.' Update successfully.');
        return parent::redirectRequest($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request, $id)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);

        $data = [];
        $is_parent = $this->model->where('head_office', $id)->first();
        $data['row'] = $this->model->find($id);
        DB::beginTransaction();
        if ($is_parent || !$this->delete($data['row'])) {
            DB::rollBack();
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('delete an office <strong>'.$data['row']->name_en.'</strong>', $this->panel, $id, 'deleted', $request);
        DB::commit();

        $request->session()->flash('success_message', $this->panel.' deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * restore the specified resource from trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        abort_unless(\Gate::allows('restore-'.Str::lower($this->panel)), 403);
        $data = [];
        $data['row'] = $this->model->onlyTrashed()->find($id);
        DB::beginTransaction();
        if (!$data['row']->restore()) {
            DB::rollBack();
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('restore an office <strong>'.$data['row']->name_en.'</strong>', $this->panel, $id, 'restored', $request);
        DB::commit();

        $request->session()->flash('success_message', $this->panel.' restore successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * restore the specified resource from trash.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Request $request, $id)
    {
        abort_unless(\Gate::allows('forceDelete-'.Str::lower($this->panel)), 403);
        $data = [];
        $data['row'] = $this->model->onlyTrashed()->find($id);
        DB::beginTransaction();

        if (!$data['row']->forceDelete()) {
            DB::rollBack();
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        if(config('custom.activity_log') == true)
        {
            ActivityLog::where('panel', $this->panel)->where('panel_id', $id)->update(['status'=> 0]);
            ActivityLog::makeActivity('permanently delete an office <strong>'.$data['row']->name_en.'</strong>', $this->panel, $id, 'forceDeleted', $request);
        }
        DB::commit();

        $request->session()->flash('success_message', $this->panel.' delete permanently.');
        return redirect()->route($this->base_route.'.index');
    }

    protected function delete($row)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);
        if (!$row) {
            return false;
        }

        $row->delete();
        return true;
    }

    public function submitFileDelete(Request $request)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);
        DB::beginTransaction();

        $id = $request->get('id'); 
        $filename = $request->get('filename');
        $data['row'] = Office::where('id', $id)->whereNotNull('image')->first();
        if($data['row'] && $data['row']['image'] == $filename)
        {

            if(parent::removeImage($filename)){

                $data['row']->update(['image'=>null]);
                ActivityLog::makeActivity('delete a file of '.$this->panel .' <a href="' . route($this->base_route . '.show', $id) . '">' .$data['row']['id'].' (image)</a>', $this->panel, $id, 'updated');
                DB::commit();
                $request->session()->flash('success_message', 'File Deleted!');
            }
            else{
                $request->session()->flash('error_message', 'No Image Found!');
            }
            
        }
        else{

            $request->session()->flash('error_message', 'Invalid Request!');
        }
        return redirect()->back()->withInput();;
    }
    public function fetchSuggestData(Request $request)
    {
        if($request->get('field') && $request->get('query'))
        {
            $query = $request->get('query');
            $field = $request->get('field');
            $data = Office::select($field)->distinct($field)->where($field, 'LIKE', '%' . $query . '%')->get();
            $output = '<ul class="dropdown-menu" style="display: block;position: absolute; padding:0px; border: 1px #ccc solid; font-size: 0.8rem; margin: -15px 0px 0px 15px;">';
            foreach ($data as $row)
            {
                $output .='<li class="'.$field.'_suggestions" style="border-bottom:0.5px #000 solid; padding: 5px; cursor: pointer;">'.$row[$field].'</li>';
            }
            $output .= "</ul>";
            echo $output;
        }
    }
}
