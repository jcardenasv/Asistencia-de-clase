<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TeacherAccessMiddleware
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
        if (auth()->user()->role === 1 || auth()->user()->role === 2) $blockAccess = false;

        if ($blockAccess) {

            return back()->with('message', ['warning', 'Necesitas ser profesor o administrador para acceder a esta opción!']);
        }

        return $next($request);
    }
}
