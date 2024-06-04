<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class PageController extends Controller
{
    public function index()
    {
        // show all page
        $pages = Page::all();
        return view('back.pages.page.index', compact('pages'));
        // End of code
    }

    public function create()
    {
        return view('back.pages.page.create');
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
            $result = Page::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'content' => $request->content
            ]);

            //echo '<pre>';
            //var_dump($result);
            //echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Page created successfully.');
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
        $preview_page = DB::table('pages')
            ->where('id', $id)
            ->first();

        //$preview_page = Page::find($id);

        if ($preview_page) {
            // echo '<pre>';
            // var_dump($preview_page);
            // echo '</pre>';exit();
            return view('back.pages.page.view', compact('preview_page'));
        } else {
            Session::put('failed', 'Data not found.');
            return redirect()->back();
        }
        // End of code
    }

    public function edit($id)
    {

        $page = DB::table('pages')
            ->where('id', $id)
            ->first();

        // $page = Page::where('id', $id)->first();
        // $page = Page::find($id);

        if ($page) {
            // echo '<pre>';
            // var_dump($page);
            // echo '</pre>';exit();
            return view('back.pages.page.edit', compact('page'));
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
            $result = Page::find($id)->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'content' => $request->content,
            ]);

            //echo '<pre>';
            //var_dump( Page::first());
            //echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Data updated successfully.');
                return redirect()->route('admin.page.all-page');
            } else {
                Session::put('failed', 'Data update failed.');
                return redirect()->back();
            }
        }
        // End of code
    }

    public function destroy($id)
    {
        $result = DB::table('pages')
            ->where('id', $id)
            ->delete();

        // $result = Page::where('id', $id)->delete();
        // $result = Page::find($id)->delete();

        if ($result) {
            Session::put('success', 'Page deleted successfully.');
            return redirect()->back();
        } else {
            Session::put('failed', 'Page not deleted.');
            return redirect()->back();
        }
        // End of code
    }
}
