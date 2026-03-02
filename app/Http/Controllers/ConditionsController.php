<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulant;
use Illuminate\Support\Facades\Auth;

class ConditionsController extends Controller
{
    /**
     * Affiche la page conditions avec les infos du postulant
     */
    public function show()
    {
        $postulant = Postulant::where('email', Auth::user()->email)->first();

        return view('conditions', compact('postulant'));
    }

    /**
     * Met à jour la candidature du postulant
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'dispo' => 'required|string|in:oui,non',
            'niveau' => 'required|string|in:oui,non',
            'PC' => 'required|string|in:oui,non',
            'Droits_de_formation' => 'required|string|in:oui,non',
        ]);

        $postulant = Postulant::where('email', Auth::user()->email)->first();

        if ($postulant) {
            $postulant->update($validated);
        }

        return redirect()->route('merci')->with('success', 'Votre candidature a été mise à jour.');
    }

    /**
     * Page de remerciement
     */
    public function merci()
    {
        return view('merci');
    }
}