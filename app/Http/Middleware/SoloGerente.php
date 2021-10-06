<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloGerente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->rol_usuario == 'gerente') {
            return $next($request);
        }
        elseif (Auth::user()->rol_usuario == 'administrador') {
            return redirect('administrador');
        }
        elseif (Auth::user()->rol_usuario == 'capataz') {
            return redirect('capataz');
        }
    }
}
