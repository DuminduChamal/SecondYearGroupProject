<?php

namespace App\Http\Middleware;

use Illuminate\Support\Str;
use Closure;
use Auth;

class checkRoleAdmin
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
        if(Str::startsWith($request->path(),'admin') == Auth::user()->is_admin){  //check path is 'admin' and autherization
            return $next($request);
        }
        abort(403);
    }
}
