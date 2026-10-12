@extends('layouts')

@section('title', 'Mes Réservations')
@section('content1')
@endsection

@section('content')
@if($reservations->count() == 0)
    <p style="color: black;">Vous n'avez aucune réservation pour l'instant.</p>
@else
<table style="color: black;">
    <thead>
        <tr>
            <th>Client</th>
            <th>Service</th>
            <th>Détails</th>
            <th>Date</th>
            <th>Status</th>

            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reservations as $res)
        <tr>
            <td>{{ $res->user->name }}</td>
            <td>{{ $res->service->titre }}</td>
            <td style="font-size: small;">{{ $res->details }}</td>
            <td>{{ \Carbon\Carbon::parse($res->date)->format('d/m/Y') }}</td>
            <td>{{ ucfirst($res->status) }}</td>
            <td>
                @if($res->status === 'en attente')
                    <form action="{{ route('reservation.updateStatus', $res->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="acceptée">
                        <button type="submit">Accepter</button>
                    </form>

                    <form action="{{ route('reservation.updateStatus', $res->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="refusée">
                        <button type="submit" style="color:red;">Refuser</button>
                    </form>
                @elseif($res->status === 'acceptée')
                    <form action="{{ route('reservation.updateStatus', $res->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="terminée">
                        <button type="submit" style="color:green;">Marquer terminée</button>
                    </form>
                @else
                    <span>-</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
