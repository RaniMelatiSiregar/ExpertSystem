<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah session admin ada
        if (!$request->session()->has('is_admin')) {
            return redirect()->route('login'); // Arahkan ke login jika tidak terautentikasi
        }

        return $next($request);
    }
}
