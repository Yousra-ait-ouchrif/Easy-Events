<?php

namespace App\Http\Controllers;

use App\Models\Plainte;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ClientController
{
    public function index()
    {
        if (Auth::check()) {
            return view('accueil');
        }

        return redirect()->route('login');
    }
    public function sendMessage(Request $request)
{
    $request->validate([
        'message' => 'required|string|max:1000',
    ]);

    Plainte::create([
        'user_id' => Auth::id(), 
        'contenu' => $request->message,
    ]);
    return redirect()->route('contact')->with('success', 'Message envoyé avec succès !');
}
public function contact(){
    return view('contact');
}

}
