<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
    * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // if(session()->has('logginId') && (url('login') == $request->url() || url('registration') == $request->url()))
        // {
        //     return redirect('/dashboard');
        // }
        if (Auth::check() && ($request->is('login') || $request->is('registration'))) {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
