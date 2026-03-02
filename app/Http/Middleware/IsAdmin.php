<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        // Vérifie si l'utilisateur est dans la table administrateurs
        if (Auth::check() && \App\Models\Administrateur::where('email', Auth::user()->email)->exists()) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Accès réservé aux administrateurs.');
    }
}