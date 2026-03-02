@extends('layouts.app')

@section('content')
<div class="merci-container">
    <h2>Merci d’avoir postulé au premier module !</h2>
    <p>Votre candidature a été enregistrée. Vous recevrez un email dès qu’elle sera acceptée.</p>
</div>

<style>
    .merci-container {
        max-width: 600px;
        margin: auto;
        text-align: center;
        padding: 2rem;
    }
    h2 {
        color: green;
    }
</style>
@endsection