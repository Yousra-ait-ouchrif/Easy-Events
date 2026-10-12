
@extends('layouts')
@section('title', 'Mes reservations')
@section('content1')
@endsection
@section('content')
<div class="container page-reservations">
    <h2>Mes Réservations de Services</h2>
   


    <table class="table">
        <thead>
            <tr>
                <th>Service</th>
                <th>Prestataire</th>
                <th>Date de réservation</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservations as $reservation)
<tr>
    <td style="color: black;">{{ $reservation->service->titre }}</td>
<td style="color: black;">
    @if($reservation->prestataire)
        <a href="{{ route('prestataire_profile', ['id' => $reservation->prestataire->id]) }}" style="color: black; text-decoration: underline;">
            {{ $reservation->prestataire->name }}
        </a>
    @else
        Prestataire inconnu
    @endif
</td>

    <td style="color: black;">{{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}</td>
    <td>
        @if($reservation->status == 'acceptée')
    <span class="text-success">Acceptée</span>
@elseif($reservation->status == 'refusée')
    <span class="text-danger">Refusée</span>
    @elseif($reservation->status == 'terminée')
    <span class="text-danger">terminée</span>
@else
    <span class="text-warning">En attente</span>
@endif

    </td>
</tr>
@empty
<tr>
    <td style="color: black;" colspan="5" class="text-center">Aucune réservation trouvée.</td>
</tr>
@endforelse

        </tbody>
    </table>
</div>
@endsection
