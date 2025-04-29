<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAfterLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        if (auth()->check() && $request->is('login')) {
            return redirect('/movies');
        }

        return $response;
    }
}