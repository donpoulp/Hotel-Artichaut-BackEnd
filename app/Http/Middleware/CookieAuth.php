<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CookieAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->hasCookie('laravel_session') || !$request->hasCookie('XSRF-TOKEN')) {
            return response()->json(['message' => '1. Non authentifié'], 401);
        }

        $user = Auth::viaRequest('cookie', function ($request) {
            return $request->user();
        });

        Log::debug('Utilisateur dans CookieAuth:', ['user' => $user]);


        if (!$user) {
            return response()->json(['message' => '2. Non authentifié'], 401);
        }

        return $next($request);
    }
}

