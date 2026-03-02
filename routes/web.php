<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConditionsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

// Page d'accueil (public)
Route::get('/', function () {
    return view('accueil');
})->name('accueil');

// Authentification (public)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// Inscription (public)
Route::get('/inscription', function () {
    return auth()->check()
        ? redirect()->route('formulaire')
        : redirect()->route('login');
})->name('inscription');

// Utilisateurs connectés (protected)
Route::middleware(['auth'])->group(function () {
    // Formulaire
    Route::get('/formulaire', [FormulaireController::class, 'showForm'])->name('formulaire');
    Route::post('/formulaire', [FormulaireController::class, 'submitForm'])->name('formulaire.submit');

    // Conditions
    Route::get('/conditions', [ConditionsController::class, 'show'])->name('conditions');
    Route::post('/conditions', [ConditionsController::class, 'store'])->name('conditions.store');
    Route::put('/conditions/update', [ConditionsController::class, 'update'])->name('conditions.update');
    Route::get('/merci', [ConditionsController::class, 'merci'])->name('merci');
});

// Tableau de bord admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Route pour valider un postulant
    Route::post('/admin/postulant/{id}/valider', [AdminController::class, 'validerPostulant'])
        ->name('admin.validerPostulant');

    // Routes pour gestion des comptes et bénéficiaires
    Route::delete('/admin/compte/{id}', [AdminController::class, 'supprimerCompte'])->name('admin.supprimerCompte');
    Route::put('/admin/compte/{id}', [AdminController::class, 'modifierCompte'])->name('admin.modifierCompte');
    Route::delete('/admin/beneficiaire/{id}', [AdminController::class, 'supprimerBeneficiaire'])->name('admin.supprimerBeneficiaire');
});