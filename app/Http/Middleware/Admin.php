<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  
        if(Auth::user() != null){
            if(Auth::user()->isAdmin() == 1){
                if($request->getPathInfo() == "/admin"){
                    return redirect('admin/dashboard');
                }
                return $next($request);
            }
        }
        else if($request->getPathInfo() == "/admin"){
            return $next($request);
        }else{
            return redirect('admin')->with('message','Toegang Geblokkeerd');
        }
    }
}
