<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceImage;
use App\Http\Controllers\Controller;


class ServiceController
{
    public function create()
    {
        return view('publier');
    }

    public function store(Request $request)
{
    $request->validate([
    'titre' => 'required|string|max:255',
    'description' => 'required|string',
    'prix' => 'required|numeric',
    'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);



   $service = new Service();
    $service->titre = $request->titre;
    $service->description = $request->description;
    $service->prix = $request->prix;
    $service->user_id = auth()->id();
    $service->valide = false;
    $service->save();


    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('services', 'public');
            $service->images()->create(['image_path' => $path]);
        }
    }


    return redirect()->route('publier')->with('success', 'Service publier avec succès');
}


public function destroy($id)
{
    $service = Service::findOrFail($id);

    if ($service->user_id !== auth()->id()) {
        abort(403, 'Accès refusé');
    }

    $service->delete();

    return redirect()->route('service_prestataire')->with('success', 'Service supprimé avec succès');
}


    public function index()
    {
        $services = Service::where('valide', 1)->with('images')->get();
        return view('service', compact('services'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $services = Service::where('valide', true)->where(function ($query) use ($request) {
        $query->where('titre', 'like', '%' . $request->input('q') . '%')
              ->orWhere('description', 'like', '%' . $request->input('q') . '%');
    })
    ->get();


       

        return view('service', compact('services'));
    }

    public function show($id)
{
    $service = Service::with('images')->findOrFail($id);
    $images = $service->images ? $service->images->pluck('image_path') : collect();

    $user = $service->user;

    $autresServices = Service::where('user_id', $user->id)
                             ->where('id', '!=', $service->id)
                             ->get();

    $evaluations = Evaluation::where('service_id', $service->id)->get();

    return view('service_show', compact('service', 'images', 'autresServices', 'evaluations'));
}


    public function recherche(Request $request)
    {
        $query = $request->input('q');

       $services = Service::where('valide', true)
    ->where(function ($query) use ($request) {
        $query->where('titre', 'like', '%' . $request->input('q') . '%')
              ->orWhere('description', 'like', '%' . $request->input('q') . '%');
    })
    ->get();


        return view('recherche', compact('services', 'query'));
    }
    public function edit($id)
{
    $service = Service::findOrFail($id);

    if ($service->user_id !== auth()->id()) {
        abort(403, 'Accès refusé');
    }

    return view('service_edit', compact('service'));
}

public function update(Request $request, $id)
{
    $service = Service::findOrFail($id);

    if ($service->user_id !== auth()->id()) {
        abort(403, 'Accès refusé');
    }

    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'prix' => 'required|numeric',
    ]);

    $service->update([
        'titre' => $request->titre,
        'description' => $request->description,
        'prix' => $request->prix,
    ]);

    return redirect()->route('service_prestataire')->with('success', 'Service modifié avec succès');
}








}
