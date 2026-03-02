@extends('layouts.app')

@section('content')
<div class="register-container">
    <h2>Créer un compte</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="nom">Nom</label>
            <input id="nom" type="text" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenoms">Prénoms</label>
            <input id="prenoms" type="text" name="prenoms" required>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input id="adresse" type="text" name="adresse">
        </div>

        <div class="form-group">
            <label for="email">Adresse email</label>
            <input id="email" type="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="telephone">Numéro de téléphone</label>
            <input id="telephone" type="text" name="telephone" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Créer mon compte</button>
    </form>

    <p>Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
</div>

<style>
    .register-container {
        max-width: 500px;
        margin: auto;
        text-align: center;
        padding: 2rem;
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
    button {
        background-color: orange;
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }
    button:hover {
        background-color: darkorange;
    }
</style>
@endsection