<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = $request->header('X-USER-ID');

        if ($user_id){
            $user = User::where('id', $user_id)->first();

            if (!$user || $user->is_admin != 1) {
                return response()->json(['message' => 'Access denied. Admin only.'], 403);
            }
        }

        return $next($request);
    }
}
