<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compte;          // ✅ modèle correct pour la table comptes
use App\Models\Postulant;
use App\Models\Beneficiaire;
use App\Models\Administrateur;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostulantValideMail;

class AdminController extends Controller
{
    /**
     * Tableau de bord admin
     */
    public function dashboard()
    {
        // Exclure les administrateurs de la liste des comptes
        $comptes = Compte::whereNotIn('email', Administrateur::pluck('email'))->get();
        $postulants = Postulant::all();
        $beneficiaires = Beneficiaire::all();

        return view('admin.dashboard', compact('comptes', 'postulants', 'beneficiaires'));
    }

    /**
     * Valider un postulant -> transfert vers bénéficiaires + email
     */
    public function validerPostulant($id)
    {
        $postulant = Postulant::findOrFail($id);

        Beneficiaire::create([
            'nom' => $postulant->nom,
            'prenoms' => $postulant->prenoms,
            'adresse' => $postulant->adresse,
            'email' => $postulant->email,
            'telephone' => $postulant->telephone,
            'password' => $postulant->password,
            'numero_unique' => uniqid(), // identifiant unique généré
        ]);

        Mail::to($postulant->email)->send(new PostulantValideMail($postulant));

        $postulant->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Postulant validé et transféré.');
    }

    /**
     * Supprimer un compte utilisateur
     */
    public function supprimerCompte($id)
    {
        Compte::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Compte supprimé.');
    }

    /**
     * Modifier un compte utilisateur
     */
    public function modifierCompte(Request $request, $id)
    {
        $compte = Compte::findOrFail($id);
        
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenoms' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
        ]);
        
        $compte->update($validated);
        return redirect()->route('admin.dashboard')->with('success', 'Compte modifié.');
    }

    /**
     * Supprimer un bénéficiaire
     */
    public function supprimerBeneficiaire($id)
    {
        Beneficiaire::findOrFail($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Bénéficiaire supprimé.');
    }
}