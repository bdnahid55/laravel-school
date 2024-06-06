<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::orderBy('order')->get();
        $menupreview = Menu::where('parent_id', '=', null)->orderBy('order')->get();
        return view('back.pages.menu.index', compact('menus','menupreview'));
    }


    public function create()
    {
        $pages = Page::all();
        $menus = Menu::where('parent_id', '=', null)->orderBy('order')->get();
        return view('back.pages.menu.create', compact('menus','pages'));
    }


    public function store(Request $request)
    {
        $check_valid = $request->validate([
            'name' => 'required|min:2',
            'parent_id' => 'max:5',
            'order' => 'required|integer|min:1|max:5',
            'url' => 'required|min:3',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back()->withInput();
        } else {

            // echo '<pre>';
            // var_dump($request->name);
            // var_dump($request->parent_id);
            // var_dump($request->order);
            // var_dump($request->url);
            // echo '</pre>';exit();

            // create data into database
            $result = Menu::create([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'order' => $request->order,
                'url' => $request->url
            ]);


            if ($result) {
                Session::put('success', 'Menu created successfully.');
                return redirect()->back();
            } else {
                Session::put('failed', 'failed.');
                return redirect()->back();
            }
        }

        // End of code
    }


    public function edit($id)
    {
        $pages = Page::all();
        $menus = Menu::where('parent_id', '=', null)->orderBy('order')->get();

        $menudata = DB::table('menus')
            ->where('id', $id)
            ->first();

        // $menudata = Menu::where('id', $id)->first();
        // $menudata = Menu::find($id);

        if ($menudata) {
            // echo '<pre>';
            // var_dump($menudata);
            // echo '</pre>';exit();
            return view('back.pages.menu.edit', compact('pages','menus','menudata'));
        } else {
            Session::put('failed', 'Data not found.');
            return redirect()->back();
        }
        // End of code
    }

    public function update(Request $request, $id)
    {
        $check_valid = $request->validate([
            'name' => 'required|min:2',
            'parent_id' => 'max:5',
            'order' => 'required|integer|min:1|max:5',
            'url' => 'required|min:3',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back()->withInput();
        } else {

            // echo '<pre>';
            // var_dump($request->name);
            // var_dump($request->parent_id);
            // var_dump($request->order);
            // var_dump($request->url);
            // echo '</pre>';exit();

            // update data into database
            $result = Menu::find($id)->update([
                'name' => $request->name,
                'parent_id' => $request->parent_id,
                'order' => $request->order,
                'url' => $request->url
            ]);


            if ($result) {
                Session::put('success', 'Menu Updated successfully.');
                return redirect()->back();
            } else {
                Session::put('failed', 'failed.');
                return redirect()->back();
            }
        }

        // End of code
    }


    public function destroy($id)
    {
        $result = DB::table('menus')
            ->where('id', $id)
            ->delete();

        // $result = Menu::where('id', $id)->delete();
        // $result = Menu::find($id)->delete();

        if ($result) {
            Session::put('success', 'Menu deleted successfully.');
            return redirect()->back();
        } else {
            Session::put('failed', 'Menu not deleted.');
            return redirect()->back();
        }
        // End of code
    }
}
