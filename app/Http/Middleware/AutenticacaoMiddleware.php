<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class AutenticacaoMiddleware
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
        $usuario = Auth::user();
        if (!Auth::guest() && isset($usuario) && !is_null($usuario) && !empty($usuario))
            return $next($request);
        return redirect()->action("AutenticacaoController@formulario");
    }
}
