
    @extends('layouts')
    @section('content1')
@endsection
@section('title', 'Mon Profil')
@section('content')

<div class="profile-container" style="max-width: 600px; margin: auto; padding: 20px; background: #f9f9f9; border-radius: 10px;">
    <h2 style="text-align:center">Mon Profil</h2>

    @if(session('success'))
        <div style="color: green; text-align:center">{{ session('success') }}</div>
    @endif

    <div style="text-align: center; margin-bottom: 20px;">
        @if(Auth::user()->image)
            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Photo de profil" style="width: 100px; height:100px; border-radius: 50%; object-fit: cover;">
        @else
            <img src="{{ asset('images/default-user.png') }}" alt="Photo de profil" style="width: 100px; height:100px; border-radius: 50%; object-fit: cover;">
        @endif
    </div>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label>Nom :</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}" required>
        </div>

        <div>
            <label>Email :</label>
            <input type="email" name="email" value="{{ Auth::user()->email }}" required>
        </div>

        <div>
            <label>Photo de profil :</label>
            <input type="file" name="image">
        </div>

        @if(Auth::user()->role === 'prestataire' || Auth::user()->role === 'admin')
            <div>
                <label>Rôle :</label>
                <input type="text" value="{{ Auth::user()->role }}" disabled>
            </div>
            
        @endif

        <button type="submit">Mettre à jour</button>
    </form>
</div>

@endsection
