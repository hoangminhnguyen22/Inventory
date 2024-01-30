<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class Verification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->status==0){ 
                return redirect()->route('auth.verify');                           
            }
            if(Auth::user()->status==2){ 
                return redirect()->route('auth.enterPassword');                           
            }
            return $next($request);
        }
    }
}
