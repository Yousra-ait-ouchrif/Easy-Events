<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
     public function showLogin()
    {
        return view('login');
    }
    public function showRegister()
{
    return view('register');
}


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->suspendu) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Votre compte a été suspendu par l\'administrateur.',
            ]);
        }

           if (Auth::user()->role === 'admin') {
            return redirect()->route('admin');
        }elseif (Auth::user()->role === 'prestataire') {
            return redirect()->route('prestataire');
        } else {
            return redirect()->route('accueil');
        }

        }

        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])
        ->withInput($request->except('password'));
    }

   


public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'role' => 'required|in:client,prestataire,admin',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
    ]);

    Auth::login($user);

    return match ($user->role) {
    'admin' => redirect()->route('admin'),
    'prestataire' => redirect()->route('prestataire'),
    default => redirect()->route('accueil'),
};



}



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    
}
