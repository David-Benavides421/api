<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Necesario para Auth::check() y Auth::user()

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string $role El rol requerido para acceder (ej: 'admin')
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Verificar si el usuario está autenticado
        if (!Auth::check()) {
            // Si no está autenticado, el middleware 'auth' ya debería haberlo redirigido.
            // Pero es buena práctica verificarlo aquí también o simplemente dejar que falle.
            // Podrías redirigirlo explícitamente si quisieras: return redirect('login');
            // O abortar, aunque 403 (Prohibido) es más para usuarios logueados sin permiso.
            // Si llega aquí sin estar logueado, probablemente sea un error de configuración de rutas.
            return redirect('login'); // 401 Unauthorized
        }

        // 2. Verificar si el usuario autenticado tiene el rol requerido
        // Usamos el helper hasRole() que definimos en el modelo User
        if (! $request->user()->hasRole($role)) {
            // Si no tiene el rol, abortamos con 403 Forbidden
            abort(403, 'ACCESO NO AUTORIZADO.');
        }

        // 3. Si tiene el rol, permite que la petición continúe
        return $next($request);
    }
}
