<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role  // Assurez-vous que ce paramètre est bien inclus
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = $request->route('role');
        if (!auth()->check() || !auth()->user()->hasRole($role)) {
            return response()->json(['message' => 'This action is unauthorized.'], 403);
        }
    
        return $next($request);
    }
}
