<?php

namespace App\Http\Middleware;

use Illuminate\Support\Str;
use Closure;
use Auth;

class checkRoleTutor
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
        if(Str::startsWith($request->path(),'tutor') == Auth::user()->is_tutor){ //check path is 'tutor' and autherization
            return $next($request);
        }
        abort(403);
    }
}
