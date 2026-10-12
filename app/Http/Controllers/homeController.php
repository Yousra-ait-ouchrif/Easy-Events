<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;

class homeController
{
    public function index()
    {
        $popularServices = Service::where('valide', true)
                              ->latest()
                              ->take(5)
                              ->get();
        $popularPrestataires = User::where('role', 'prestataire')->take(5)->get();

        return view('accueil', compact('popularServices', 'popularPrestataires'));
    }
}


