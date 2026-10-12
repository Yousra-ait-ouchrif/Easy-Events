<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;

class ReservationController
{
    
    public function form($id)
    {
        $service = Service::findOrFail($id);
        return view('reserver', compact('service'));
    }

    


public function store(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('login')->withErrors(['auth' => 'Vous devez être connecté.']);
    }

    $request->validate([
        'service_id' => 'required|exists:services,id',
        'date' => 'required|date',
        'details' => 'required|string',
    ]);

    
    $service = Service::findOrFail($request->service_id);

Reservation::create([
    'user_id' => auth()->id(),
    'service_id' => $request->service_id,
    'prestataire_id' => $service->user_id,  
    'date' => $request->date,
    'details' => $request->details,
]);


    return redirect()->route('service')->with('success', 'Réservation enregistrée avec succès.');
}


public function mesReservations()
{
    $reservations = Reservation::with(['service', 'prestataire']) 
        ->where('user_id', auth()->id())
        ->get();

        
    return view('mesreservation', compact('reservations'));
}
public function updateStatus(Request $request, $id)
{
    $reservation = Reservation::findOrFail($id);

    if (auth()->user()->id !== $reservation->prestataire_id) {
        abort(403);
    }

    $request->validate([
        'status' => 'required|in:en attente,acceptée,refusée,terminée',
    ]);

    $reservation->status = $request->status;
    $reservation->save();

    return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
}





}



