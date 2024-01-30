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

    //đăng nhập api
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('auth.index');
    }
}
