@extends('layouts')
@section('title', 'Événements Faciles')
@section('content1')
@endsection

@section('content')
<div class="container">
    <header>
        <h1>Interface Administrateur - Préparation d'Événement</h1>
    </header>

    @if(session('success'))
        <div style="color:black;" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="#valider-services">Valider les services</a></li>
            <li><a href="#gerer-plaintes">Gérer les plaintes</a></li>
            <li><a href="#gerer-utilisateurs">Gérer les utilisateurs</a></li>
        </ul>
    </nav>

    <!-- Valider les services -->
    <section id="valider-services">
        <h2>Valider les services (Contrôler la qualité)</h2>
        <table>
            <tr>
                <th style="color: black;">Service</th>
                <th style="color: black;">Prestataire</th>
                <th style="color: black;">Prix</th>
                <th style="color: black;">Actions</th>
            </tr>
            @foreach($services as $service)
            <tr>
                <td style="color: black;">{{ $service->titre }}</td>
                <td style="color: black;">{{ $service->user->name ?? 'Inconnu' }}</td>
                <td style="color: black;">{{ $service->prix }} MAD</td>
                <td style="color: black;">
                    <form action="{{ route('admin.service.valider', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="admin">Valider</button>
                    </form>
                    <form action="{{ route('admin.service.rejeter', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="admin">Rejeter</button>
                    </form>
                    <form action="{{ route('admin.service.supprimer', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="admin" style="background-color: red;">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </section>

    <!-- Gérer les plaintes -->
    <section id="gerer-plaintes">
        <h2>Gérer les plaintes (Résoudre les litiges)</h2>
        <table>
            <tr>
                <th style="color: black;">Nom Client</th>
                <th style="color: black;">Plainte</th>
                <th style="color: black;">Actions</th>
            </tr>
            @foreach($plaintes as $plainte)
            <tr>
                <td style="color: black;">{{ $plainte->user->name ?? 'Inconnu' }}</td>
                <td style="color: black;">{{ $plainte->contenu }}</td>
                <td style="color: black;">
                    <form action="{{ route('admin.plainte.resoudre', $plainte->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="admin" {{ $plainte->status == 'résolue' ? 'disabled' : '' }}>
                            {{ $plainte->status == 'résolue' ? 'Déjà Résolue' : 'Résoudre' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </section>

    <!-- Gérer les utilisateurs -->
    <section id="gerer-utilisateurs">
        <h2>Gérer les utilisateurs (Suspendre ou Supprimer)</h2>
        <table>
            <tr>
                <th style="color: black;">Utilisateur</th>
                <th style="color: black;">Rôle</th>
                <th style="color: black;">Actions</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td style="color: black;">{{ $user->name }}</td>
                <td style="color: black;">{{ $user->role }}</td>
                <td style="color: black;">
                    <form action="{{ route('admin.user.suspendre', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="admin">Suspendre</button>
                    </form>
                    <form action="{{ route('admin.user.supprimer', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="admin" style="background-color: red;">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </section>
</div>
@endsection
