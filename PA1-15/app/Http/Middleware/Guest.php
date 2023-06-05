<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,...$guards): Response
    {
        if (!Auth::guard('admin')->check()  && !Auth::guard('petani')->check()) {
            return redirect('/petani/login');
        }

        return $next($request);
    }
}
