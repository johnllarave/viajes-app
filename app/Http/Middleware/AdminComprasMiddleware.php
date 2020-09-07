<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class AdminComprasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }
        //Si el usuario no es administrador lo redirecciona para el inicio
        if (auth()->user()->role_id <> 1) {
            //die();
            return redirect('/home');
        }
        return $next($request);
    }
}
