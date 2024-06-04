<?php

namespace App\Http\Controllers;

use App\Models\ImportantLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ImportantLinkController extends Controller
{
    public function index()
    {
        // show all posts
        $importantlinks = ImportantLink::all();
        return view('back.pages.importantlink.index', compact('importantlinks'));
        // End of code
    }

    public function create()
    {
        return view('back.pages.importantlink.create');
        // End of code
    }

    public function store(Request $request)
    {
        $check_valid = $request->validate([
            'title' => 'required|min:3|unique:important_links',
            'url' => 'required|min:3|max:100',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back()->withInput();
        } else {

            // create data into database
            $result = ImportantLink::create([
                'title' => $request->title,
                'url' => $request->url
            ]);

            //echo '<pre>';
            //var_dump($result);
            //echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Important Link created successfully.');
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
        $preview_importantlink = DB::table('important_links')
            ->where('id', $id)
            ->first();

        //$preview_importantlink = ImportantLink::find($id);

        if ($preview_importantlink) {
            // echo '<pre>';
            // var_dump($preview_importantlink);
            // echo '</pre>';exit();
            return view('back.pages.importantlink.view', compact('preview_importantlink'));
        } else {
            Session::put('failed', 'Data not found.');
            return redirect()->back();
        }
        // End of code
    }

    public function edit($id)
    {

        $importantlink = DB::table('important_links')
            ->where('id', $id)
            ->first();

        // $importantlink = ImportantLink::where('id', $id)->first();
        // $importantlink = ImportantLink::find($id);

        if ($importantlink) {
            // echo '<pre>';
            // var_dump($importantlink);
            // echo '</pre>';exit();
            return view('back.pages.importantlink.edit', compact('importantlink'));
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
            'url' => 'required|min:3',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back()->withInput();
        } else {
            // update data into database
            $result = ImportantLink::find($id)->update([
                'title' => $request->title,
                'url' => $request->url
            ]);

            //echo '<pre>';
            //var_dump($result);
            //echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Data updated successfully.');
                return redirect()->route('admin.importantlink.all-importantlink');
            } else {
                Session::put('failed', 'Data update failed.');
                return redirect()->back();
            }
        }
        // End of code
    }

    public function destroy($id)
    {
        $result = DB::table('important_links')
            ->where('id', $id)
            ->delete();

        // $result = ImportantLink::where('id', $id)->delete();
        // $result = ImportantLink::find($id)->delete();

        if ($result) {
            Session::put('success', 'Important Link deleted successfully.');
            return redirect()->back();
        } else {
            Session::put('failed', 'Important Link not deleted.');
            return redirect()->back();
        }
        // End of code
    }
}
