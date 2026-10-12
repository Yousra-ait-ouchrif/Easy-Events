@extends('layouts') 

@section('title', 'Connexion')
@section('content1')
@endsection

@section('content')
<div class="login-container">

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: black;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form" action="{{ route('login') }}" method="POST">
        @csrf

        <p class="title">Se connecter</p>
        
        <label>
            <input class="input" type="email" name="email" value="{{ old('email') }}" required>
            <span>Email</span>
        </label> 

        <label>
            <input class="input" type="password" name="password" placeholder="" required>
            <span>Mot de passe</span>
        </label>

        <button class="submit">Se connecter</button>

        <p class="signin">Créer un nouveau compte <a href="{{ route('register') }}">S'inscrire</a></p>
    </form>
</div>
@endsection
