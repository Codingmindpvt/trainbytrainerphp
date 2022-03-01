<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSuspended
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
        if (Auth::user() != null) {
            // P = Pending, C = Certified, S = Suspend
            if(Auth::user()->status == 'S'){
                Auth::logout();
                return redirect()->route('login');
            }
        }
        return $next($request);
    }
}
