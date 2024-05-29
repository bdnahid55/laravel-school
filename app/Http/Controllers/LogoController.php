<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class LogoController extends Controller
{

    // logo edit page
    public function edit(Logo $logo)
    {
        $Logo = Logo::first();
        return view('back.pages.logo.index', compact('Logo'));

        // echo '<pre>';
        // print_r($Logo);
        // exit();
    }

    // update logo
    public function update(Request $request)
    {
        $check_valid = $request->validate([
            'name' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back();
        } else {

            if ($request->hasFile('image')) {

                // delete previous image
                $findImage = Logo::first();
                if ($findImage->image != null) {
                    unlink(public_path('uploads/logo/' . $findImage->image));
                }
                // upload new image
                $image = $request->file('image');
                $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/logo');
                $image->move($destinationPath, $filename);

                // insert only image in database
                $result = Logo::first()->update([
                    'image' => $filename
                ]);
            }

            // update data into database
            $result = Logo::first()->update([
                'name' => $request->name
            ]);

            // echo '<pre>';
            // var_dump( Logo::first());
            // echo '</pre>';exit();

            if ($result) {
                Session::put('success', 'Data updated successfully.');
                return redirect()->back();
            } else {
                Session::put('failed', 'Data update failed.');
                return redirect()->back();
            }
        }

        // end of code
    }
}
