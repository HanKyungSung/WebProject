<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
        return $next($request)
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Access-Control-Allow-Origin, Authorization, content-type')
            ->header('Access-Control-Allow-Origin', '*');
    }
}
