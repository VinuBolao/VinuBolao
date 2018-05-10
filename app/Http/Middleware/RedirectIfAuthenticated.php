<?php

namespace Bolao\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (env('APP_ENV') === 'production') {
                header('Location: https://vinubolao.com.br/bolao');
            } else {
                return redirect()->secure('/bolao');
            }
        }

        return $next($request);
    }
}
