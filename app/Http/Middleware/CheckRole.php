<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's role is equal to the specified role
            if (Auth::user()->role_roleid == $role) {
                return $next($request);
            }
        }

        // Redirect to a different URL if the user doesn't have the correct role
        return redirect('/');
    }
}
