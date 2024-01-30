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
        if (!Auth::check()) { 
            return redirect()->route('auth.index');
        }

        $user = Auth::user();
        $route = $request->route()->getName();
        
        if($user->cant($route)){
             return redirect()->route('admin.error', ['code' => 403]);
        }
        return $next($request);
    }
}
