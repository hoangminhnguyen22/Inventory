<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Auth;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    //đăng nhập web
    // public function handle($request, Closure $next, ...$guards)
    // {
    //     if (!Auth::check()) { // chưa đăng nhập
    //         return redirect()->route('auth.index');
    //     }
        
    //     $user = Auth::user(); // lấy thông tin user khi đã đăng nhâp
    //     $route = $request->route()->getName();// kiemr tra quyền của người dùng
        
    //     // if($user->cant($route)){
    //     //      return redirect()->route('admin.error', ['code' => 403]);
    //     // }
        
    //     return $next($request);
    // }

    //đăng nhập api
    protected function redirectTo(Request $request): ?string
    {
        // if (Auth::guard('api')->check()) //check api như auth:check() web
        // {
        //     logger(Auth::guard('api')->user());

        // }else{
        //     logger("User not authorized");
        // }
        return $request->expectsJson() ? null : route('auth.index');
    }
}
