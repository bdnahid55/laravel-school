<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BackupController extends Controller
{

    public function create()
    {
        $data = Artisan::call('backup:run');
        if ($data) {
            Session::put('success', 'Backup created successfully');
            return redirect()->route('admin.home');
        } else {
            Session::put('failed', 'Backup failed.');
            return redirect()->route('admin.home');
        }
    }

    public function destroy()
    {
        $data = Artisan::call('backup:clean');
        if ($data) {
            Session::put('success', 'Backup deleted successfully.');
            return redirect()->route('admin.home');
        } else {
            Session::put('failed', 'Backup delete failed.');
            return redirect()->route('admin.home');
        }
    }
}
