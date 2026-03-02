@extends('layouts.app')

@section('content')
<div class="login-container">
    <h2>Connexion</h2>

    <!-- Message global si des erreurs existent -->
    @if ($errors->any())
        <div class="alert alert-danger" style="text-align:left; margin-bottom:1rem;">
            <ul style="margin:0; padding-left:1rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Champ email -->
        <div class="form-group">
            <label for="email">Adresse email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Champ mot de passe -->
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte</a></p>
</div>

<style>
    .login-container {
        max-width: 400px;
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
    .text-danger {
        color: red;
        font-size: 0.9rem;
    }
    .alert-danger {
        background-color: #f8d7da;
        color: #842029;
        border: 1px solid #f5c2c7;
        border-radius: 5px;
        padding: 0.8rem;
    }
</style>
@endsection