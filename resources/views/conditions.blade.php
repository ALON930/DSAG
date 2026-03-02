@extends('layouts.app')

@section('content')
<div class="conditions-container">
    <h2>Validation de votre candidature</h2>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulaire de validation/modification -->
    <form method="POST" action="{{ route('conditions.update') }}">
        @csrf
        @method('PUT')

        <!-- Nom -->
        <div class="form-group">
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" value="{{ $postulant->nom }}" required>
        </div>

        <!-- Prénoms -->
        <div class="form-group">
            <label for="prenoms">Prénoms</label>
            <input id="prenoms" type="text" name="prenoms" value="{{ $postulant->prenoms }}" required>
        </div>

        <!-- Adresse -->
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input id="adresse" type="text" name="adresse" value="{{ $postulant->adresse }}">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ $postulant->email }}" required>
        </div>

        <!-- Téléphone -->
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input id="telephone" type="text" name="telephone" value="{{ $postulant->telephone }}" required>
        </div>

        <!-- Réponses au questionnaire -->
        <div class="form-group">
            <label for="dispo">Disponibilité</label>
            <input id="dispo" type="text" name="dispo" value="{{ $postulant->dispo }}" required>
        </div>

        <div class="form-group">
            <label for="niveau">Niveau requis</label>
            <input id="niveau" type="text" name="niveau" value="{{ $postulant->niveau }}" required>
        </div>

        <div class="form-group">
            <label for="PC">PC conforme</label>
            <input id="PC" type="text" name="PC" value="{{ $postulant->PC }}" required>
        </div>

        <div class="form-group">
            <label for="Droits_de_formation">Droits de formation</label>
            <input id="Droits_de_formation" type="text" name="Droits_de_formation" value="{{ $postulant->Droits_de_formation }}" required>
        </div>

        <!-- Bouton de validation -->
        <button type="submit" class="btn-submit">Valider ma candidature</button>
    </form>
</div>

<style>
    .conditions-container {
        max-width: 600px;
        margin: auto;
        padding: 2rem;
        text-align: center;
    }
    .form-group {
        margin-bottom: 1rem;
        text-align: left;
    }
    label {
        font-weight: bold;
    }
    input {
        width: 100%;
        padding: 0.5rem;
        margin-top: 0.3rem;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .btn-submit {
        background-color: orange;
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }
    .btn-submit:hover {
        background-color: darkorange;
    }
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        padding: 0.8rem;
        border-radius: 5px;
        margin-bottom: 1rem;
    }
</style>
@endsection