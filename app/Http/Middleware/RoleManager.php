<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if(Auth::check()){
            $user=Auth::user();
            $roles=explode('|',$role);
            if(!in_array($user->role,$roles)){
                return redirect()->route($user->getRoute());
            }

            return $next($request);
        }else{
            session(['redirect'=>$request->url()]);
            return redirect()->route('n.front.login');
        }
    }
}
