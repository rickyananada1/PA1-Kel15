<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAprroval
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('petani')->check() && !Auth::guard('petani')->user()->status == 0) {
            // Redirect atau berikan respons error sesuai kebijakan Anda
            return redirect('/')->with('error', 'Akun Anda Belum di Approve.');
        }
        return $next($request);
    }
}
