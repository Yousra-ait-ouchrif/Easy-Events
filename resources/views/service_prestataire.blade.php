@extends('layouts')
@section('content1')
@endsection
@section('content')
<div style="padding: 30px;">
    <h2 style="text-align: center;">Mes services</h2>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin: 15px 0; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; background-color: #fff; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
        <thead style="background-color: #222; color: white;">
            <tr>
                <th style="padding: 10px;">Image</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr style="border-bottom: 1px solid #ccc;">
                    <td style="padding: 10px;">
                    





                    </td>
                    <td style="color: black;">{{ $service->titre }}</td>
                    <td style="color: black;">{{ Str::limit($service->description, 50) }}</td>
                    <td style="color: black;">{{ $service->prix }} DH</td>
                    <td>
                        <a href="{{ route('service.edit', $service->id) }}" style=" color: blue; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Modifier</a>

                       
                        <form action="{{ route('service.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Supprimer ce service ?')" style=" color: white; padding: 5px 10px; border: none; border-radius: 5px;">Supprimer</button>
                        </form>

                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Aucun service publié.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
