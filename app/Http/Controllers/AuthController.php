<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Str;


class AuthController extends Controller
{

    // Show login page
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin.home');
        } else {
            return view('back.pages.admin.auth.login');
        }
        // End of code
    }

    // login process
    public function LoginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|min:8|max:40',

        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('adminuser.login')->withFail('Oppes! You have entered invalid credentials');
        }
        // End of code
    }

    // Go to Dashboard
    public function dashboard()
    {
        if (Auth::check()) {
            return view('back.pages.admin.home');
        }
        return redirect()->route('adminuser.login')->withFail('Opps! You do not have access');
        // End of code
    }

    // logout function
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('admin.login')->withSuccess('You have Successfully logged out');
        // End of code
    }
}
