<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class frameMiddleware
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

        $request->headers->set('X-Frame-Options', '*');
        return $next($request);
    }
}
