<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Ensure the authenticated user is an admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        // Redirect non-admins to login or home page
        return redirect('/')->with('error', 'Access denied!');
    }
}
