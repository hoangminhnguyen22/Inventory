<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class adminMiddleware
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
        //check xem cos quyeenf vaof trang admin khoong
        if(Auth::check()){
            if(Auth::user()->status==0){
                return redirect()->route('auth.verify');      
            }
            if(Auth::user()->status==2){
                return redirect()->route('auth.enterPassword');          
            }
            if(Auth::user()->status==3){
                return redirect()->route('admin.ban');
            } 
        }
        return $next($request);
    }
}
