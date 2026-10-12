<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use App\Models\Service;
use App\Models\User;

use Illuminate\Http\Request;

class userController
{
public function show($id)
{
    $user = User::findOrFail($id);
    $services = Service::where('user_id', $id)->get();

    return view('prestataire_profile', compact('user', 'services'));
}



public function update(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        
        if ($user->image) {
            Storage::delete('public/' . $user->image);
        }

        $imagePath = $request->file('image')->store('users', 'public');
        $user->image = $imagePath;
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    return redirect()->back()->with('success', 'Profil mis à jour.');
}
public function profil()
{
    $user = auth()->user();
    return view('profile', compact('user'));
}



}
