<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HERMANT Romain - TP Laravel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" href="{{asset('storage/images/logo.svg')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('storage/images/logo.svg')}}" width="30" height="30" class="d-inline-block align-top" alt="Pokeball"> Pokedex
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            @admin
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Administration</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownGestAlbum">
                                        <a class="dropdown-item" href="{{ route('create-pokemon') }}">
                                            <img src="{{asset('storage/images/egg.svg')}}" alt="Oeufs" width="15" height="15"> Ajouter un pokemon
                                        </a>
                                        <a class="dropdown-item" href="{{ route('read-type') }}">
                                            <img src="{{asset('storage/images/type.svg')}}" alt="Tornade" width="15" height="15"> Gérer les types
                                        </a>
                                        <a class="dropdown-item" href="{{ route('pokemons') }}">
                                            <img src="{{asset('storage/images/pokedex.svg')}}" alt="Pokedex" width="15" height="15"> Gérer le pokedex
                                        </a>
                                        <a class="dropdown-item" href="{{ route('utilisateurs') }}">
                                            <img src="{{asset('storage/images/dresseur.svg')}}" alt="Utilisateur" width="15" height="15"> Gérer les utilisateurs
                                        </a>
                                    </div>
                                </li>
                            @endadmin
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('mon-equipe') }}">
                                        <img src="{{asset('storage/images/sac.svg')}}" alt="Déconnexion icon" width="15" height="15"> Mon équipe
                                    </a>
                                    <a class="dropdown-item" href="{{ route('pokedex') }}">
                                        <img src="{{asset('storage/images/pokedex.svg')}}" alt="Pokedex" width="15" height="15"> Pokedex
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <img src="{{asset('storage/images/logout.svg')}}" alt="Déconnexion icon" width="15" height="15"> 
                                        {{ __('Déconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
