<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Jika pengguna belum login, redirect ke halaman login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ambil role user yang sedang login
        $authUserRole = Auth::user()->role;

        // Pastikan role sesuai dengan route yang diakses
        if (
            ($role === 'admin' && $authUserRole == 0) || 
            ($role === 'customer' && $authUserRole == 1)
        ) {
            return $next($request);
        }

        // Redirect ke halaman sesuai role
        if ($authUserRole == 0) {
            return redirect()->route('admin'); // Admin dashboard
        } elseif ($authUserRole == 1) {
            return redirect()->route('dashboard'); // Customer dashboard
        }

        // Default redirect jika role tidak valid
        return redirect()->route('login');
    }
}
