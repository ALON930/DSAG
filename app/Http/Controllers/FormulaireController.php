<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulant;
use Illuminate\Support\Facades\Auth;

class FormulaireController extends Controller
{
    /**
     * Affiche le formulaire
     */
    public function showForm()
    {
        return view('formulaire');
    }

    /**
     * Traite la soumission du formulaire
     */
    public function submitForm(Request $request)
    {
        // Validation des réponses
        $validated = $request->validate([
            'q1' => 'required|string|in:oui,non',
            'q2' => 'required|string|in:oui,non',
            'q3' => 'required|string|in:oui,non',
            'q4' => 'required|string|in:oui,non',
        ]);

        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Vérifier si le postulant existe déjà
        $postulant = Postulant::where('email', $user->email)->first();

        if ($postulant) {
            // Mise à jour des réponses
            $postulant->update([
                'dispo' => $validated['q1'],
                'niveau' => $validated['q2'],
                'PC' => $validated['q3'],
                'Droits_de_formation' => $validated['q4'],
            ]);
        } else {
            // Création si jamais le postulant n'existe pas encore
            Postulant::create([
                'nom' => $user->nom,
                'prenoms' => $user->prenoms,
                'adresse' => $user->adresse,
                'email' => $user->email,
                'telephone' => $user->telephone,
                'password' => $user->password,

                'dispo' => $validated['q1'],
                'niveau' => $validated['q2'],
                'PC' => $validated['q3'],
                'Droits_de_formation' => $validated['q4'],
            ]);
        }

        // Redirection vers la page suivante
        return redirect()->route('conditions')->with('success', 'Vos réponses ont été enregistrées.');
    }
}