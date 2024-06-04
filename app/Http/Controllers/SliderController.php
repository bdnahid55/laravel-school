<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        // show all posts
        $sliders = Slider::all();
        return view('back.pages.slider.index', compact('sliders'));
        // End of code
    }

    public function create()
    {
        return view('back.pages.slider.create');
        // End of code
    }

    public function store(Request $request)
    {
        $check_valid = $request->validate([
            'title' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,gif,jpg|max:2048',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back();
        } else {

            if ($request->hasFile('image')) {
                // upload new file
                $file = $request->file('image');
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/slider');
                $file->move($destinationPath, $filename);
            }

            // insert data into database
            $result = Slider::create([
                'title' => $request->title,
                'image' => $filename,
            ]);

            // echo '<pre>';
            // var_dump($result);
            // echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Slider created successfully.');
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
        $preview_slider = DB::table('sliders')
            ->where('id', $id)
            ->first();

        //$preview_slider = Slider::find($id);

        if ($preview_slider) {
            // echo '<pre>';
            // var_dump($preview_slider);
            // echo '</pre>';exit();
            return view('back.pages.slider.view', compact('preview_slider'));
        } else {
            Session::put('failed', 'Data not found.');
            return redirect()->back();
        }
        // End of code
    }

    public function edit($id)
    {

        $slider = DB::table('sliders')
            ->where('id', $id)
            ->first();

        // $slider = Slider::where('id', $id)->first();
        // $slider = Slider::find($id);

        if ($slider) {
            // echo '<pre>';
            // var_dump($slider);
            // echo '</pre>';exit();
            return view('back.pages.slider.edit', compact('slider'));
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
            'image' => 'image|mimes:jpeg,png,gif,jpg|max:2048',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back();
        } else {

            if ($request->hasFile('image')) {

                // delete previous file
                $findFile = Slider::find($id);
                if ($findFile->image != null) {
                    unlink(public_path('uploads/slider/' . $findFile->image));
                }

                // upload new file
                $file = $request->file('image');
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/slider');
                $file->move($destinationPath, $filename);

                // insert only file in database
                $result = Slider::find($id)->update([
                    'image' => $filename
                ]);
            }

            // update data into database
            $result = Slider::find($id)->update([
                'title' => $request->title,
            ]);

            // echo '<pre>';
            // var_dump($result);
            // echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Data updated successfully.');
                return redirect()->route('admin.slider.all-slider');
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
        $findFile = Slider::find($id);
        if ($findFile->image != null) {
            unlink(public_path('uploads/slider/' . $findFile->image));
        }

        $result = DB::table('sliders')
            ->where('id', $id)
            ->delete();

        // $result = Slider::where('id', $id)->delete();
        // $result = Slider::find($id)->delete();

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
