<?php

namespace App\Http\Middleware;

use Closure, Auth;
use Redirect;
use Illuminate\Http\Request;

class AdminAuth
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
         if(Auth::guard('admin')->check()){
            if(Auth::guard('admin')->user()->role_type == 'A'){
                return $next($request);
            }else{
                return Redirect::to("/");
            }
        }else{
            return Redirect::to("/admin/login");
        }
    }
}
