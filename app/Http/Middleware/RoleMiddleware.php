<?php

// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        // dd(Auth::user()->role);
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/'); // Redirect to homepage if not authorized
        }
        return $next($request);
    }
}