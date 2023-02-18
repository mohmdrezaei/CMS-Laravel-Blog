<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAuthorMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userRole = auth()->user()->role ;
        if ($userRole !== 'admin' && $userRole !== 'author'){
            abort(403,'شما دسترسی لازم برای ورود یه این صفحه را ندارید !');
        }
        return $next($request);
    }
}
