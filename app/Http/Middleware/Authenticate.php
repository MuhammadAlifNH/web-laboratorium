<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next, ...$guards)
    {
        // Cek apakah pengguna login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Cek role pengguna
        $user = Auth::user();
        if ($user->role !== 'admin_pusat') {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}
