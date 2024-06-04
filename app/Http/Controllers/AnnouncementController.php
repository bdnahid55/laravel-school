<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AnnouncementController extends Controller
{

    public function index()
    {
        // show all posts
        $announcements = Announcement::all();
        return view('back.pages.announcement.index', compact('announcements'));
        // End of code
    }

    public function create()
    {
        return view('back.pages.announcement.create');
        // End of code
    }

    public function store(Request $request)
    {
        $check_valid = $request->validate([
            'title' => 'required|min:3|unique:announcements',
            'description' => 'required|min:3',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back()->withInput();
        } else {

            // create data into database
            $result = Announcement::create([
                'title' => $request->title,
                'description' => $request->description
            ]);

            //echo '<pre>';
            //var_dump($result);
            //echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Announcement created successfully.');
                return redirect()->back();
            } else {
                Session::put('failed', 'failed.');
                return redirect()->back();
            }
        }

        // end of code
    }

    public function show($id)
    {
        $preview_announcement = DB::table('announcements')
            ->where('id', $id)
            ->first();

        //$preview_announcement = Announcement::find($id);

        if ($preview_announcement) {
            // echo '<pre>';
            // var_dump($preview_announcement);
            // echo '</pre>';exit();
            return view('back.pages.announcement.view', compact('preview_announcement'));
        } else {
            Session::put('failed', 'Data not found.');
            return redirect()->back();
        }
        // End of code
    }

    public function edit($id)
    {

        $announcement = DB::table('announcements')
            ->where('id', $id)
            ->first();

        // $announcement = Announcement::where('id', $id)->first();
        // $announcement = Announcement::find($id);

        if ($announcement) {
            // echo '<pre>';
            // var_dump($announcement);
            // echo '</pre>';exit();
            return view('back.pages.announcement.edit', compact('announcement'));
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
            'description' => 'required|min:3',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back()->withInput();
        } else {
            // update data into database
            $result = Announcement::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            //echo '<pre>';
            //var_dump($result);
            //echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Data updated successfully.');
                return redirect()->route('admin.announcement.all-announcement');
            } else {
                Session::put('failed', 'Data update failed.');
                return redirect()->back();
            }
        }
        // End of code
    }

    public function destroy($id)
    {
        $result = DB::table('announcements')
            ->where('id', $id)
            ->delete();

        // $result = Announcement::where('id', $id)->delete();
        // $result = Announcement::find($id)->delete();

        if ($result) {
            Session::put('success', 'Announcement deleted successfully.');
            return redirect()->back();
        } else {
            Session::put('failed', 'Page not deleted.');
            return redirect()->back();
        }
        // End of code
    }
}
