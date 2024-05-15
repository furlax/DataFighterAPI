<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Personne;
use Illuminate\Support\Facades\Auth;


class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = Auth::user();

        // Obtenir l'ID de l'utilisateur ou de la personne demandée dans la route
        $requestedId = $request->route('id');

        // Vérifier si l'utilisateur est admin ou si l'ID correspond à celui de l'utilisateur connecté
        if ($user->hasRole('admin') || $user->uti_no == $requestedId) {
            return $next($request);
        }

        // Pour Personne, vérifier si l'ID de personne correspond à l'utilisateur
        if ($request->route()->getName() == 'personne.show') {
            $personne = Personne::find($requestedId);
            if ($personne && $personne->user_id == $user->uti_no) {
                return $next($request);
            }
        }

        return response()->json(['message' => 'Access Denied'], 403);
        
    }
}
