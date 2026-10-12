<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class PrestataireController
{
     public function index()
    {
        if (Auth::check()) {
            return view('prestataire');
        }

        return redirect()->route('login');
    }
    public function service_prestataire()
    {
        $services = Service::with('images')->where('user_id', auth()->id())->get();

        return view('service_prestataire', compact('services'));
    }

    public function reservation_prestataire()
    {
        $reservations = Reservation::whereHas('service', function($q) {
            $q->where('user_id', Auth::id());
        })->with(['user', 'service'])->get();

        return view('reservation_prestataire', compact('reservations'));
    }

    
}
