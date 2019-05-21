<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Request;

class AdminMiddleware
{
    /**
     * 后台相关
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!(Auth::guard("admin")->check())) {
            return redirect("admin/login");
        }

        return $next($request);
    }
}
