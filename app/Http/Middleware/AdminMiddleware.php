<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        // cek login
        if (!auth()->check()) {

            return redirect('/login');

        }

        // cek role
        if (auth()->user()->role !== 'admin') {

            abort(403, 'AKSES KHUSUS ADMIN');

        }

        return $next($request);
    }
}