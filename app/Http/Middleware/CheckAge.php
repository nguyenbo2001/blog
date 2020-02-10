<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
        if ( $request->has('age') && $request->age < 18 || isset($request->age) && $request->age < 18 ) {
            return redirect('/');
        }
        return $next($request);
    }
}
