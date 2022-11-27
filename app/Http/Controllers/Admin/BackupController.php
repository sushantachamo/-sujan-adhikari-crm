<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Exception;
use Storage;
use Illuminate\Support\Str;

class BackupController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.backups';
    protected $view_path = 'admin.backup';
    protected $panel = 'Backups';

    public function index()
    {    
        abort_unless(\Gate::allows('show-'.Str::lower($this->panel)), 403);
        if (!count(config('backup.backup.destination.disks'))) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }
        $data= [];
        $data['per_page'] = 10;
        foreach (config('backup.backup.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $adapter = $disk->getDriver()->getAdapter();
            $files = $disk->allFiles();

            // make an array of backup files, with their filesize and creation date
            foreach ($files as $k => $f) {
                // only take the zip files into account
                if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                    $data['backups'][] = [
                        'file_path'     => $f,
                        'file_name'     => str_replace('backups/', '', $f),
                        'file_size'     => $disk->size($f),
                        'last_modified' => $disk->lastModified($f),
                        'disk'          => $disk_name,
                        'download'      => ($adapter instanceof Local) ? true : false,
                    ];
                }
            }
        }
        // reverse the backups, so the newest one would be on top
        if(isset($data['backups']))
        {
            $data['backups'] = array_reverse($data['backups']);
        }
        else
        {
            $data['backups'] = [];
        }

        return view(parent::loadDefaultDataToView($this->view_path.'.index'), compact('data'));
    }

    public function create(Request $request)
    {
        abort_unless(\Gate::allows('create-'.Str::lower($this->panel)), 403);

        try {
            ini_set('max_execution_time', 12000);
            Artisan::call('backup:run --disable-notifications');
            $output = Artisan::output();
            if (strpos($output, 'Backup failed because')) {
                preg_match('/Backup failed because(.*?)$/ms', $output, $match);
                $message = "Backup process failed because ";
                $message .= isset($match[1]) ? $match[1] : '';
                return redirect()->back()->withErrors($message);
                
            } else {
                $request->session()->flash('success_message', 'Backup process completed');
            }
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Downloads a backup zip file.
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
            $request->session()->flash('error_message', 'The backup file doesn\'t exist.');
            return redirect()->route($this->base_route.'.index');
        }
        
    }

    /**
     * Deletes a backup file.
     */
    public function delete(Request $request, $file_name)
    {
        abort_unless(\Gate::allows('delete-'.Str::lower($this->panel)), 403);
        $disk = Storage::disk($request->input('disk'));

        if ($disk->exists($file_name)) {
            $disk->delete($file_name);

            $request->session()->flash('success_message', 'The backup file was deleted.');
            return redirect()->route($this->base_route.'.index');
        } else {
            $request->session()->flash('error_message', 'The backup file doesn\'t exist.');
            return redirect()->route($this->base_route.'.index');
        }
    }
}
