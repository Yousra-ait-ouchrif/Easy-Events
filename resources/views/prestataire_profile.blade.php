
@extends('layouts')
@section('content1')
@endsection
@section('title', 'Profil Prestataire')

@section('content')
<div class="prestataire-container">
    <div class="profile-header">
<img src="{{ asset('storage/' . $user->photo) }}" alt="Photo de {{ $user->name }}" class="profile-pic" style="width: 100px; height: 100px; border-radius: 50%;">
                <div class="info">
            <h2 style="color: black;">{{ $user->name }}</h2>
            <p style="color: black;">Email: {{ $user->email }}</p>
            <p style="color: black;">Rôle: {{ $user->role }}</p>
        </div>
    </div>

    <hr>

    <div style="color: black;" class="services-list">
        <h3>Services Proposés</h3>
        <div class="service-grid">
            @forelse($services as $service)
                <div class="service-card">
                    <h4>{{ $service->titre }}</h4>
                    <p>{{ $service->prix }} DH</p>
                    <a href="{{ route('service_show', $service->id) }}" class="btn">Voir Détails</a>
                </div>
            @empty
                <p style="color: black;">Aucun service disponible pour ce prestataire.</p>
            @endforelse
        </div>
    </div>
</div>


@endsection

