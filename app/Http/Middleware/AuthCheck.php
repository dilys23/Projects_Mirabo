<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
    * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('loginId'))
        {
            return redirect('login')->with('fail', 'You have to login first');
        }
        return $next($request);
    }
}
