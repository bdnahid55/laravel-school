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
        // if (Artisan::call('backup:run') == 0) {
        if (Artisan::call('backup:run --only-files') == 0) {
            Session::put('success', 'Backup created successfully');
        } else {
            Session::put('failed', 'Backup failed.');
        }
        return redirect()->route('admin.home');
    }

    public function destroy()
    {
        if (Artisan::call('backup:clean') == 0) {
            Session::put('success', 'Backup deleted successfully.');
        } else {
            Session::put('failed', 'Backup delete failed.');
        }
        return redirect()->route('admin.home');
    }
}
