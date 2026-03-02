<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use App\Models\Administrateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Traite la connexion
     */
    public function login(Request $request)
    {
        // Validation des champs
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 1️⃣ Vérifier dans la table comptes
        $compte = Compte::where('email', $credentials['email'])->first();

        if ($compte && Hash::check($credentials['password'], $compte->password)) {
            Auth::login($compte);
            $request->session()->regenerate();
            return redirect()->route('formulaire'); // tableau de bord utilisateur
        }

        // 2️⃣ Vérifier dans la table administrateurs
        $admin = Administrateur::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard'); // tableau de bord admin
        }

        // 3️⃣ Si rien trouvé
        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ]);
    }

    /**
     * Affiche le formulaire d'inscription
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Traite l'inscription
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:comptes',
            'telephone' => 'required|string|max:20|unique:comptes',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $compte = Compte::create([
            'nom' => $validated['nom'],
            'prenoms' => $validated['prenoms'],
            'adresse' => $validated['adresse'] ?? null,
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'password' => $validated['password'],
        ]);

        Auth::login($compte);

      // Debug : doit afficher le compte nouvellement créé

        return redirect()->route('formulaire');
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}