<?php

namespace App\Http\Controllers;

use App\Models\SchoolHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class SchoolHistoryController extends Controller
{
    // school history edit page
    public function edit(SchoolHistory $schoolHistory)
    {
        $SchoolHistory = SchoolHistory::first();
        return view('back.pages.schoolhistory.index', compact('SchoolHistory'));

        // echo '<pre>';
        // print_r($SchoolHistory);
        // exit();
    }

    // update school history
    public function update(Request $request)
    {
        $check_valid = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'image' => 'image|mimes:jpeg,png,gif,jpg|max:2048',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back();
        } else {

            if ($request->hasFile('image')) {

                // delete previous image
                $findImage = SchoolHistory::first();
                if ($findImage->image != null) {
                    unlink(public_path('uploads/schoolhistory/' . $findImage->image));
                }
                // upload new image
                $image = $request->file('image');
                $filename = Str::random(20) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/schoolhistory');
                $image->move($destinationPath, $filename);

                // insert only image in database
                $result = SchoolHistory::first()->update([
                    'image' => $filename
                ]);
            }

            // update data into database
            $result = SchoolHistory::first()->update([
                'title' => $request->title,
                'description' => $request->description
            ]);

            // echo '<pre>';
            // var_dump($result);
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


