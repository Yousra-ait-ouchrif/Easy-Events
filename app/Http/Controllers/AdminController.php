<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Plainte;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController
{
     public function index()
    {
        $services = Service::all();
        $users = User::all();
        $plaintes = Plainte::orderBy('created_at', 'desc')->get();
    
        if (Auth::check()) {
            return view('admin' , compact('services', 'users','plaintes'));
        }

        return redirect()->route('login');
    }
    public function validerService($id)
    {
        $service = Service::findOrFail($id);
        $service->valide = true;
        $service->save();

        return back()->with('success', 'Service validé');
    }

    public function rejeterService($id)
    {
        $service = Service::findOrFail($id);
        $service->valide = false;
        $service->save();

        return back()->with('success', 'Service rejeté');
    }

    public function suspendreUser($id)
    {
        $user = User::findOrFail($id);
        $user->suspendu = true; 
        $user->save();

        return back()->with('success', 'Utilisateur suspendu');
    }

    public function gererPlaintes()
{
    $plaintes = Plainte::with('user')->get();

    return view('admin', compact('plaintes'));
}
public function resoudre($id)
{
    $plainte = Plainte::findOrFail($id);

    
    $plainte->status = 'résolue';
    $plainte->save();

    return redirect()->back()->with('success', 'Plainte résolue avec succès.');
}
public function supprimerService($id)
{
    $service = Service::findOrFail($id);
    $service->delete();

    return back()->with('success', 'Service supprimé avec succès.');
}

public function supprimerUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return back()->with('success', 'Utilisateur supprimé avec succès.');
}


    
}
