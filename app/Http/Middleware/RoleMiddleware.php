<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // Cek apakah user sudah login
        if (!$request->user()) {
            return response('Unauthorized.', 401);
        }

        // Validasi role user
        if ($request->user()->role !== $role) {
            return response('Forbidden', 403);
        }

        return $next($request);
    }
}
    