<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ControlAccessMiddleware
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
        $blockAccess = true;
        if (auth()->user()->role === 1) $blockAccess = false;

        if ($blockAccess) {

            return back()->with('message', ['warning', 'Necesitas ser administrador para acceder a esta opción!']);
        }

        return $next($request);
    }
}
