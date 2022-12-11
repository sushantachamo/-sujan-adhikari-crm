<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Storage;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\Template\ImportValidation;
use App\Helpers\Helper as Helper;

class TemplateController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.templates';
    protected $view_path = 'admin.template';
    protected $panel = 'Templates';

    public function index()
    {
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        if (!count(config('template.template.destination.disks'))) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data= [];
        $data['per_page'] = 10;
        foreach (config('template.template.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getDriver()->getAdapter();
            $files = $disk->allFiles();
            // make an array of template files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -5) == '.docx' && $disk->exists($f)) {
                    $names = explode('/', $f);
                    $type = $names[1];
                    $fullname = isset($names[2]) ? $names[2] : $names[1];
                    // $type = str_replace('templates/', '', $f);

                    $data['templates'][] = [
                        'file_path'     => $f,
                        'file_name'     => $fullname,
                        'type'          => $type,
                        'file_size'     => $disk->size($f),
                        'last_modified' => $disk->lastModified($f),
                        'disk'          => $disk_name,
                        'download'      => ($adapter instanceof Local) ? true : false,
                    ];
                }
            }
        }
        // reverse the templates, so the newest one would be on top
        // if(isset($data['templates']))
        // {
        //     $data['templates'] = array_reverse($data['templates']);
        // }
        // else
        // {
        //     $data['templates'] = [];
        // }
        $collection = collect($data['templates']);

        $sorted =$collection->sortBy([
            ['file_name', 'asc'],
        ]);
        $data['templates'] = $sorted ;

        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('data'));
    }

    public function create(Request $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);
        $data=[];
        return view(parent::loadDefaultDataToView($this->view_path . '.create'), compact('data'));
    }

    public function store(ImportValidation $request)
    {
        $file = $request->file('import_template');
        $file_type = $request->get('import_template_type');
        if($file)
        {
            $file_size = $file->getSize();
            $upload_max_filesize_kilobytes = Helper::parse_size(ini_get('upload_max_filesize'));
            $upload_max_filesize_bytes     = $upload_max_filesize_kilobytes * 1024 ;

            if ($file_size < $upload_max_filesize_bytes && $file_size != 0 && $file->isValid())
            {
                $allowedDocExtension = ['docx'];
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedDocExtension);

                $original_name = explode('.',$file->getClientOriginalName())[0];
                $original_name = str_split($original_name, 100)[0] ;
                $filename = $original_name.'.'.$file->getClientOriginalExtension();

                $path = $file->storeAs('word-template/'.$file_type.'/', $filename);
            }
            else
            {
                $request->session()->flash('error_message', "File upload failed. The file may not be greater than ".(int)($upload_max_filesize_kilobytes/1024 )."MB.");
                return redirect()->back()->withInput();
            }

        }
        $request->session()->flash('success_message', $this->panel . ' inserted successfully.');
        return parent::redirectRequest($request);
        
    } 

    /**
     * Downloads a template zip file.
     */
    public function download(Request $request)
    {
        abort_unless(\Gate::allows('download-'.Str::lower($this->panel)), 403);
        $disk = Storage::disk($request->input('disk'));
        $file_name = $request->input('file_name');
        $adapter = $disk->getDriver()->getAdapter();
        $storage_path = $disk->getDriver()->getAdapter()->getPathPrefix();

        if ($disk->exists($file_name)) {
            return response()->download($storage_path.$file_name);
        } else {
            $request->session()->flash('error_message', 'The template file doesn\'t exist.');
            return redirect()->route($this->base_route.'.index');
        }
        
    }

    /**
     * Deletes a template file.
     */
    public function delete(Request $request, $file_name)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);
        $disk = Storage::disk($request->input('disk'));

        if ($disk->exists($file_name)) {
            $disk->delete($file_name);

            $request->session()->flash('success_message', 'The template file was deleted.');
            return redirect()->route($this->base_route.'.index');
        } else {
            $request->session()->flash('error_message', 'The template file doesn\'t exist.');
            return redirect()->route($this->base_route.'.index');
        }
    }
}
