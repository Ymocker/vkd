<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;



class Visitors
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
        Visitor::Check($request);
        return $next($request);
    }
}
