<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class NoticeController extends Controller
{
    public function index()
    {
        // show all Notice
        $notices = Notice::all();
        return view('back.pages.notice.index', compact('notices'));
        // End of code
    }

    public function create()
    {
        return view('back.pages.notice.create');
        // End of code
    }

    public function store(Request $request)
    {
        $check_valid = $request->validate([
            'title' => 'required|min:3|unique:pages',
            'content' => 'required|min:3',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back()->withInput();
        } else {

            // create data into database
            $result = Notice::create([
                'title' => $request->title,
                'content' => $request->content
            ]);

            //echo '<pre>';
            //var_dump($result);
            //echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Notice created successfully.');
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
        $preview_notice = DB::table('notices')
            ->where('id', $id)
            ->first();

        //$preview_notice = Notice::find($id);

        if ($preview_notice) {
            // echo '<pre>';
            // var_dump($preview_notice);
            // echo '</pre>';exit();
            return view('back.pages.notice.view', compact('preview_notice'));
        } else {
            Session::put('failed', 'Data not found.');
            return redirect()->back();
        }
        // End of code
    }

    public function edit($id)
    {
        $notice = DB::table('notices')
            ->where('id', $id)
            ->first();

        // $notice = Notice::where('id', $id)->first();
        // $notice = Notice::find($id);

        if ($notice) {
            // echo '<pre>';
            // var_dump($notice);
            // echo '</pre>';exit();
            return view('back.pages.notice.edit', compact('notice'));
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
            'content' => 'required|min:3',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back()->withInput();
        } else {
            // update data into database
            $result = Notice::find($id)->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);

            //echo '<pre>';
            //var_dump($result);
            //echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Data updated successfully.');
                return redirect()->route('admin.notice.all-notice');
            } else {
                Session::put('failed', 'Data update failed.');
                return redirect()->back();
            }
        }
        // End of code
    }

    public function destroy($id)
    {
        $result = DB::table('notices')
            ->where('id', $id)
            ->delete();

        // $result = Notice::where('id', $id)->delete();
        // $result = Notice::find($id)->delete();

        if ($result) {
            Session::put('success', 'Notice deleted successfully.');
            return redirect()->back();
        } else {
            Session::put('failed', 'Page not deleted.');
            return redirect()->back();
        }
        // End of code
    }
}
