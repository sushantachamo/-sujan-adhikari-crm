<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\SiteConfig;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiteConfigController extends BaseController
{
    protected $base_route = 'admin.site_config';
    protected $view_path = 'admin.site_config';
    protected $panel = 'Site Configuration';
    protected $model;
    protected $image_name = null;
    protected $folder;
    protected $folder_path;

    public function __construct()
    {

        $this->model = new SiteConfig();
        $this->folder = config('myPath.assets.panel_image_folders.site-config');
        $this->folder_path = public_path('images'.DIRECTORY_SEPARATOR.$this->folder);

    }

    public function edit()
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);
        $data = [];

        $data['rows'] = $this->model->all()->groupBy('config_keys');
        return view(parent::loadDefaultDataToView($this->view_path.'.edit'), compact('data'));
    }
    public function update(Request $request)
    {
        abort_unless(\Gate::allows('update-'.Str::lower($this->panel)), 403);
        DB::beginTransaction();
        foreach ($request->except(['_token','submit']) as $key => $value){
            switch($key){
                case 'image':
                    $row = $this->model->where('config_keys', 'logo')->first();

                    parent::uploadImage($request, 'update', $row->config_values);
                    $row->config_values = $this->image_name ? $this->image_name : $row->logo;
                    $row->save();
                    break;

                case 'social_media_links':
                    $row = $this->model->where('config_keys', $key)->first();
                    $data = json_decode($row['config_values'], 1);
                    foreach ($data as $k => $v){
                        $value[$k]['title'] = $v['title'];
                    }
                    $social_links = json_encode($value);
                    $row->config_values = $social_links;
                    $row->save();
                    break;

                default:
                    $row = $this->model->where('config_keys', $key)->first();
                    if($row)
                    {
                        $row->config_values = $value;
                        $row->save();
                    }
                    break;
            }
        }

        if(config('custom.activity_log') == true)
            ActivityLog::makeActivity('update a '.$this->panel, $this->panel, 0, 'updated');
        DB::commit();

        return redirect()->route($this->base_route . '.edit');

    }
}
