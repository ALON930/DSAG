@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f4f6f9;
        color: #333;
    }

    .admin-dashboard {
        max-width: 1200px;
        margin: auto;
        padding: 2rem;
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .dashboard-header h1 {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .admin-info {
        font-size: 1rem;
        color: #555;
    }

    .dashboard-sections {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .card {
        background: #fff;
        border-radius: 8px;
        padding: 1.5rem;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card h2 {
        margin-bottom: 1rem;
        color: #e67e22;
        border-bottom: 2px solid #f39c12;
        padding-bottom: 0.5rem;
    }

    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
        font-size: 0.95rem;
    }

    .styled-table th, .styled-table td {
        padding: 0.8rem;
        border: 1px solid #ddd;
        text-align: left;
    }

    .styled-table th {
        background-color: #f9f9f9;
        font-weight: bold;
    }

    .styled-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    button {
        background-color: #e67e22;
        color: white;
        border: none;
        padding: 0.6rem 1.2rem;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
    }

    button:hover {
        background-color: #d35400;
    }

    /* Flash messages */
    .alert {
        padding: 1rem;
        margin-bottom: 1rem;
        border-radius: 5px;
        font-weight: bold;
    }
    .alert-success {
        background-color: #2ecc71;
        color: white;
    }
    .alert-error {
        background-color: #e74c3c;
        color: white;
    }
</style>

<div class="admin-dashboard">
    <header class="dashboard-header">
        <h1>Bienvenue dans l’espace Administrateur</h1>
        <p class="admin-info">
            {{ Auth::guard('admin')->user()->nom }} - {{ Auth::guard('admin')->user()->email }}
        </p>
    </header>

    <!-- Messages flash -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif

    <section class="dashboard-sections">
        <!-- Comptes utilisateurs -->
        <div class="card">
            <h2>Comptes utilisateurs</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comptes as $compte)
                        <tr>
                            <td>{{ $compte->nom }}</td>
                            <td>{{ $compte->email }}</td>
                            <td>{{ $compte->telephone }}</td>
                            <td>
                                <form action="{{ route('admin.supprimerCompte', $compte->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Postulants -->
        <div class="card">
            <h2>Postulants</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($postulants as $postulant)
                        <tr>
                            <td>{{ $postulant->nom }}</td>
                            <td>{{ $postulant->email }}</td>
                            <td>
                                <form action="{{ route('admin.validerPostulant', $postulant->id) }}" method="POST">
                                    @csrf
                                    <button type="submit">Valider</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bénéficiaires -->
        <div class="card">
            <h2>Bénéficiaires</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($beneficiaires as $beneficiaire)
                        <tr>
                            <td>{{ $beneficiaire->nom }}</td>
                            <td>{{ $beneficiaire->email }}</td>
                            <td>
                                <form action="{{ route('admin.supprimerBeneficiaire', $beneficiaire->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection