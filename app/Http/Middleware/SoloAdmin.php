<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
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
        if (auth::user()->rol=='administrador') {
    return $next($request);
    }
    elseif (auth::user()->rol=='gerente') {
    return redirect('user');
    } 
    elseif (auth::user()->rol=='capataz') {
    return redirect('capataz');        
    }
}
}