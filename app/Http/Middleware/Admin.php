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
            }else{
                Auth::logout();
                session(['error' => "Toegang Geweigerd"]);
                return redirect()->route('admin')->with('error', 'Toegang Geweigerd');
            }
        }
        else if($request->getPathInfo() == "/admin"){
            return $next($request);
        }else{
            session(['error' => "Toegang Geweigerd"]);
            return redirect()->route('admin')->with('error', 'Toegang Geweigerd');
        }

        return $next($request);
    }
}
