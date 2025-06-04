<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('login'); // Redirect if not logged in
        }

        return $next($request);
    }
}
