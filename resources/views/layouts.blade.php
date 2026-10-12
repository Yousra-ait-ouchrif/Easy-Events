<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Événements Faciles')</title>
    <link rel="stylesheet" href="{{ asset('css/you.css') }}">
    <link rel="stylesheet" href="{{ asset('css/inscrire.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prestataire.css') }}">
    
</head>
<body>
<header>
    <nav class="navbar">
        <div class="nav-left">
            <div class="logo">
                <img src="images/logo1.jpg" alt="logo">
            </div>
       
            <a href="{{ route('accueil') }}">Accueil</a>
            <a href="{{ route('service') }}">Services</a>
            <a href="{{ route('contact') }}">Contact</a>
            @auth
    @if (Auth::user()->role === 'client')
        <a href="{{ route('mesreservation') }}">Mes services</a>
    @elseif (Auth::user()->role === 'prestataire')
        <a href="{{ route('prestataire') }}">P_Dashboard</a>
    @elseif (Auth::user()->role === 'admin')
        <a href="{{ route('admin') }}">A_Dashboard</a>
    @endif
@endauth



        </div>
        <div class="nav-right">
        <form action="{{ route('recherche') }}" method="GET" class="search-box">
  <input type="text" name="q" class="search-input" placeholder="Rechercher..." required>
  <button type="submit" class="search-button" title="Rechercher">🔍</button>
</form>
<div class="dropdown">
    <a href="#" class="icon-account" title="Mon Compte">
        @auth
            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Profil" style="width: 30px; height: 30px; border-radius: 50%;">
        @else
            &#128100; 
        @endauth
    </a>
    <div class="dropdown-content">
        @guest
            <a href="{{ route('login') }}">Se Connecter</a>
            <a href="{{ route('register') }}">S'inscrire</a>
        @else
            <p>Bienvenue, <a href="{{ route('profil') }}">{{ Auth::user()->name }}</a></p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
        @endguest
    </div>
</div>

        </div>
    </nav>
</header>


    <main>
    <div class="flex justify-center">
    @section('content1')
      <img  src="images/librarry.jpg" >
    @show
  </div>

        @yield('content')
    </main>
    </main>
    <footer >
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around; gap: 40px;">
        
        <!-- Colonne Services -->
        <div >
            <h3 style="border-bottom: 2px ; padding-bottom: 10px;">Services</h3>
            <ul style="list-style: none;  padding: 0; line-height: 1.8;">
                <li><a href="{{ route('service') }}" style="color: black; text-decoration: none;">Photographes</a></li>
                <li><a href="{{ route('service') }}" style="color: black; text-decoration: none;">Traiteurs</a></li>
                <li><a href="{{ route('service') }}" style="color: black;; text-decoration: none;">Coiffeurs</a></li>
                <li><a href="{{ route('service') }}" style="color: black; text-decoration: none;">Décorateurs</a></li>
            </ul>
        </div>

        
        <div style="max-width: 300px;">
            <h3 style="border-bottom: 2px ; padding-bottom: 10px;">À propos</h3>
            <p style="color: black;">
                Événements Faciles est votre partenaire idéal pour organiser des événements mémorables avec des services de qualité et des prestataires fiables.
            </p>
        </div>

        <!-- Colonne Contact -->
        <div>
            <h3 style="border-bottom: 2px ; padding-bottom: 10px;">Contact</h3>
            <p>Email : <a href="mailto:contact@evenementsfaciles.fr" >contact@evenementsfaciles.fr</a></p>
            <p>
                <a href="{{ route('contact') }}" style=" margin-right: 10px;">Facebook</a>
                <a href="{{ route('contact') }}" style="margin-right: 10px;">Instagram</a>
                <a href="{{ route('contact') }}" >Twitter</a>
            </p>
        </div>
    </div>

    <hr style="border: 0; border-top: 1px solid #444; margin: 30px 0;">
    <p style="text-align: center; font-size: 14px; color: #aaa;">© 2025 Événements Faciles - Tous droits réservés</p>
</footer>

</body>
</html>