@extends('layouts')
@section('title', 'recherche')
@section('content1')
@endsection
@section('content')
    <h2>Résultats de recherche pour : "{{ $query }}"</h2>

    @if ($services->isEmpty())
        <p style="color: grey;">Aucun service ne correspond à votre recherche.</p>
    @else
        <div class="services-grid">
            @foreach ($services as $service)
                <div class="service-card">
                    <img src="{{ asset($service->image) }}" alt="{{ $service->titre }}">
                    <h3 style="color: black;">{{ $service->titre }}</h3>
                    <p style="color: black;">{{ $service->description }}</p>
                    <a href="{{ route('service_show', $service->id) }}">Voir les détails</a>
                </div>
            @endforeach
        </div>
    @endif
@endsection


