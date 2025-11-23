<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * El middleware acepta uno o varios roles:
     *  ->middleware('role:admin')
     *  ->middleware('role:admin,staff')
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // Si no hay usuario autenticado
        if (! $user) {
            abort(403, 'No autenticado.');
        }

        // Si el rol del usuario NO está en la lista permitida
        if (! in_array($user->role, $roles)) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
