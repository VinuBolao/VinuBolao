<?php

namespace Bolao\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpsProtocol
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
		if (!$request->secure() && env('APP_ENV') === 'production') {
			$request->setTrustedProxies([$request->getClientIp()], Request::HEADER_X_FORWARDED_ALL);
			return redirect()->secure($request->getRequestUri());
		}
		
		return $next($request);
	}
}