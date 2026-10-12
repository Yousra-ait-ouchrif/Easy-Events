
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


@extends('layouts')
@section('title', 'Réserver un service')
@section('content1')
@endsection
@section('content')
    <h2>Réserver : {{ $service->titre }}</h2>

    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id }}">

        <label for="date" style="color: black;">Date de l'événement :</label>
        <input type="date" name="date" required>

        <label for="details" style="color: black;">Détails :</label>
        <textarea name="details" rows="4" required></textarea>

        <button type="submit">Confirmer la réservation</button>
    </form>
@endsection

