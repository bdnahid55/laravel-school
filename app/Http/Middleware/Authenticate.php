<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{

    public function handle(Request $request, Closure $next): Response
    {

        if ($request->routeIs('admin.*')) {
            if (Auth::check()) {
                return $next($request);
            }
        }

        // abort(401);
        session()->flash('fail', 'You must login to access this page');
        return redirect()->route('admin.login');


    }
}
