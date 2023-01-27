<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isadminMiddleware
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
        if(!auth()->user()->hasRole("admin"))
        {
//asdasdasd
            abort(401);
        }
        return $next($request);
    }
}
