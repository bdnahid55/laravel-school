<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Redirect;


class FooterController extends Controller
{
    // logo edit page
    public function edit(Footer $footer)
    {
        $Footer = DB::table('footers')->first();
        //$Footer = Footer::first();

        return view('back.pages.footer.index', compact('Footer'));

        // echo '<pre>';
        // print_r($Footer);
        // exit();
    }

    // update logo
    public function update(Request $request)
    {
        $check_valid = $request->validate([
            'title' => 'required|min:3',
        ]);

        // check if token is valid
        if (!$check_valid) {
            Session::put('failed', 'Error !!!');
            return redirect()->back();
        } else {

            // update data into database
            $result = Footer::first()->update([
                'title' => $request->title
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
