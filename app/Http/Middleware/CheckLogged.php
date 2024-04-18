<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            if (auth()->user()->role->name === 'admin')
                return redirect()->intended('/administrator');

            if (auth()->user()->role->name === 'project-manager')
                return redirect()->intended('/project-manager');

            if (auth()->user()->role->name === 'developer')
                return redirect()->intended('/developer');

            abort('403', 'Unauthorized');
        }

        if ($request->is('login'))
            return $next($request);

        return redirect()->intended('/login');
    }
}
