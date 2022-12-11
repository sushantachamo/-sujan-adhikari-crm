<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Slider;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\Slider\AddFormValidation;
use App\Http\Requests\Admin\Slider\EditFormValidation;
use Auth;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SliderController extends BaseController
{

    protected $model;
    protected $view_path = 'admin.sliders';
    protected $base_route = 'admin.sliders';
    protected $panel = 'Slider';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
        $this->folder = config('myPath.assets.panel_image_folders.sliders'); 
        $this->folder_path = public_path('images'.DIRECTORY_SEPARATOR.$this->folder);
    }

    public function index(Request $request)
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        $data = [];

        $data['per_page'] = $request->per_page ? $request->per_page : 10;

        $data['rows'] = $this->model->select('id','caption_title','image','rank','status')
                                    ->where(function ($query) use($request){

                                        if($request->has('filter_caption_title') && $request->get('filter_caption_title'))
                                            $query->where('caption_title', 'like', '%'.$request->get('filter_caption_title').'%');

                                        if($request->has('filter_created_at') && $request->get('filter_created_at'))
                                            $query->where('created_at', 'like', '%'.$request->get('filter_created_at').'%');

                                        if($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all')
                                            $query->where('status', $request->get('filter_status') == 'active' ? 1:0);
                                    })
                                    ->orderBy('rank')->paginate($data['per_page']);
        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('data'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        return view(parent::loadDefaultDataToView($this->view_path.'.create'));
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
        $rank = $this->model->max('rank');
        if($rank == null)
            $rank = 0;
        else
            $rank = $rank + 1;

        parent::uploadImage($request);

        $slider = Slider::create([
            'image' => $this->image_name,
            'caption_title' => $request->get('caption_title'),
            'caption_body' => $request->get('caption_body'),
            'alt_text' => $request->get('alt_text'),
            'rank' => $rank,
            'status' => $request->get('status'),
            'user_id' => Auth::user()->id,
        ]);

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('Add a new '.$this->panel .' <a href="' . route($this->base_route . '.show', $slider->id) . '">' . $request->get('caption_title') . '</a>', $this->panel, $slider->id, 'created');
        DB::commit();


        $request->session()->flash('success_message', $this->panel.' added successfully!!');
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
        $data['row'] = $this->model->find($id);

        if(!$data['row']){
            $request->session()->flash('error_message', 'Invalid Request!!');
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

        if(!$data['row']){
            $request->session()->flash('error_message', 'Invalid Request!!');
            return redirect()->route($this->base_route.'.index');
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
    public function update(EditFormValidation $request, $id)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);
        $data = [];
        $data['row'] = $this->model->find($id);
        DB::beginTransaction();
        if(!$data['row']){
            $request->session()->flash('error_message', 'Invalid Request!!');
            return redirect()->route($this->base_route.'.index');
        }

        $this->image_name = $data['row']->image;
        parent::uploadImage($request, 'update', $data['row']->image);

        $data['row']->update([
            'image' => $this->image_name,
            'caption_title' => $request->get('caption_title'),
            'caption_body' => $request->get('caption_body'),
            'alt_text' => $request->get('alt_text'),
            'status' => $request->get('status'),
        ]);

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('update a '.$this->panel .' <a href="' . route($this->base_route . '.show', $id) . '">' . $request->get('caption_title') . '</a>', $this->panel, $id, 'updated');
        DB::commit();

        $request->session()->flash('success_message', $this->panel.' updated successfully!!');
        return parent::redirectRequest($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);
        $data = [];
        DB::beginTransaction();
        $data['row'] = $this->model->find($id);

        if(!$this->delete($data['row'])){
            $request->session()->flash('error_message', 'Invalid Request!!');
            return redirect()->route($this->base_route.'.index');
        }
        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('delete a '.$this->panel .' <a href="' . route($this->base_route . '.show', $id) . '">' . $data['row']->caption_title . '</a>', $this->panel, $id, 'deleted');
        DB::commit();

        $request->session()->flash('success_message', $this->panel.' deleted successfully!!');
        return redirect()->route($this->base_route.'.index');

    }

    public function delete($row)
    {
        if(!$row){
            return false;
        }
        $this->image_name = $row->image;
        parent::removeImage($this->image_name);

        $row->delete();

        return true;
    }

    public function updateRank(Request $request)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);
        DB::beginTransaction();
        if ($request->has('hidden_id') && $request->get('hidden_id')) {

            $data['slider_id'] = $request->get('hidden_id');
            foreach ($data['slider_id'] as $key => $slider_id) {
                $rank_order = $key + 1;
                $member = Slider::find($slider_id);
                $member->update([
                    'rank' => $rank_order
                ]);
            }

            if(config('custom.activity_log') == true)
                ActivityLog::makeActivity('update a rank of '.$this->panel, $this->panel, $slider_id, 'updated');
            DB::commit();

            $request->session()->flash('success_message', 'Rank updated successfully!!');

        } else {
            $request->session()->flash('error_message', 'Invalid Request!!');

        }

        return redirect()->route($this->base_route.'.index');

    }

    public function destroySlider(Request $request)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);
        $id = $request->get('key');
        $data = [];
        DB::beginTransaction();
        $data['row'] = Slider::find($id);
        if (!$this->delete($data['row'])) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('delete a '.$this->panel .' <a href="' . route($this->base_route . '.show', $id) . '">' . $data['row']->caption_title . '</a>', $this->panel, $id, 'deleted');
        DB::commit();

        $request->session()->flash('success_message', 'Slider deleted successfully.');
        return response($request);
    }
}