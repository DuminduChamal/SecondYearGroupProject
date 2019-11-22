<?php

namespace App\Http\Middleware;

use Illuminate\Support\Str;
use Closure;
use Auth;

class checkRoleBothUsers
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
        if(Str::startsWith($request->path(),'/select') == Auth::user()->is_student && Auth::user()->is_tutor){
            return $next($request);
        }
        abort(403);
    }
}