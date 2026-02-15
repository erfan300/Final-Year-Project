<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// Used to block user access to admin routes if not logged in
class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Uses sessions to authenticate access
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
