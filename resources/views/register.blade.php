@extends('layouts')
@section('title', 'Inscription')

@section('content1')
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: black;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="form">
        @csrf

        <p class="title">S'inscrire</p>

        <label>
            <input class="input" type="text" name="name" value="{{ old('name') }}" required>
            <span>Nom & Prénom</span>
            @error('name')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </label>

        <label>
            <input class="input" type="email" name="email" value="{{ old('email') }}" required>
            <span>Email</span>
            @error('email')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </label>

        <label>
            <input class="input" type="password" name="password" required>
            <span>Mot de passe</span>
            @error('password')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </label>

        <label>
            <input class="input" type="password" name="password_confirmation" required>
            <span>Confirme Mot de passe</span>
            @error('password_confirmation')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </label>

        <label for="role">Le rôle</label>
        <select name="role" id="role" required>
            <option value="">-- Choisir un rôle --</option>
            <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
            <option value="prestataire" {{ old('role') == 'prestataire' ? 'selected' : '' }}>Prestataire</option>
        </select>
        @error('role')
            <small style="color: red;">{{ $message }}</small>
        @enderror

        <button type="submit" class="submit">S'inscrire</button>

        <p class="signin">Vous avez déjà un compte ?
            <a href="{{ route('login') }}">Se connecter</a>
        </p>
    </form>

@endsection
