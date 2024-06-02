<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DownloadController extends Controller
{
    public function index()
    {
        // show all posts
        $downloads = Download::all();
        return view('back.pages.download.index', compact('downloads'));
        // End of code
    }

    public function create()
    {
        return view('back.pages.download.create');
        // End of code
    }

    public function store(Request $request)
    {
        $check_valid = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|mimes:pdf,jpeg,png,gif,jpg|max:2048',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back();
        } else {

            if ($request->hasFile('description')) {
                // upload new file
                $file = $request->file('description');
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/download');
                $file->move($destinationPath, $filename);
            }

            // insert data into database
            $result = Download::create([
                'title' => $request->title,
                'description' => $filename,
            ]);

            // echo '<pre>';
            // var_dump($result);
            // echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Download created successfully.');
                return redirect()->back();
            } else {
                Session::put('failed', 'Failed.');
                return redirect()->back();
            }
        }
        // end of code
    }

    public function show($id)
    {
        $preview_download = DB::table('downloads')
            ->where('id', $id)
            ->first();

        //$preview_download = Download::find($id);

        if ($preview_download) {
            // echo '<pre>';
            // var_dump($preview_download);
            // echo '</pre>';exit();
            return view('back.pages.download.view', compact('preview_download'));
        } else {
            Session::put('failed', 'Data not found.');
            return redirect()->back();
        }
        // End of code
    }

    public function edit($id)
    {

        $download = DB::table('downloads')
            ->where('id', $id)
            ->first();

        // $download = Download::where('id', $id)->first();
        // $download = Download::find($id);

        if ($download) {
            // echo '<pre>';
            // var_dump($download);
            // echo '</pre>';exit();
            return view('back.pages.download.edit', compact('download'));
        } else {
            Session::put('failed', 'Data not found.');
            return redirect()->back();
        }
        // End of code
    }

    public function update(Request $request, $id)
    {
        $check_valid = $request->validate([
            'title' => 'required|min:3',
            'description' => 'mimes:pdf,jpeg,png,gif,jpg|max:2048',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back();
        } else {

            if ($request->hasFile('description')) {

                // delete previous file
                $findFile = Download::find($id);
                if ($findFile->description != null) {
                    unlink(public_path('uploads/download/' . $findFile->description));
                }

                // upload new file
                $file = $request->file('description');
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/download');
                $file->move($destinationPath, $filename);

                // insert only file in database
                $result = Download::find($id)->update([
                    'description' => $filename
                ]);
            }

            // update data into database
            $result = Download::find($id)->update([
                'title' => $request->title,
            ]);

            // echo '<pre>';
            // var_dump($result);
            // echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Data updated successfully.');
                return redirect()->route('admin.download.all-download');
            } else {
                Session::put('failed', 'Data update failed.');
                return redirect()->back();
            }
        }
        // End of code
    }

    public function destroy($id)
    {
        // delete previous file
        $findFile = Download::find($id);
        if ($findFile->description != null) {
            unlink(public_path('uploads/download/' . $findFile->description));
        }

        $result = DB::table('downloads')
            ->where('id', $id)
            ->delete();

        // $result = Download::where('id', $id)->delete();
        // $result = Download::find($id)->delete();

        if ($result) {
            Session::put('success', 'Data deleted successfully.');
            return redirect()->back();
        } else {
            Session::put('failed', 'Data was not deleted.');
            return redirect()->back();
        }
        // End of code
    }
}
