<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string $role
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!Auth::check()) {
            return redirect('/login'); // Atau kembalikan respons JSON jika di API
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            abort(403, 'Unauthorized'); // Atau kembalikan respons JSON jika di API
        }

        return $next($request);
    }
}
