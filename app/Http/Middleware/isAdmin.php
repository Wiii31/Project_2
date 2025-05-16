<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Cek session manual
        if ($request->session()->get('login') === true && $request->session()->get('tipe_akun') === 'Admin') {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
