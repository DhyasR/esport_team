<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>{{ $pageTitle }}</title>
</head>

<body>

    <div class="container p-5">

        <div class="card text-center">

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">

                <div class="container">

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="nav nav-tabs card-header-tabs">

                            <li class="nav-item">
                                <a class="nav-link {{ $isActiveShowTeams ?? '' }}" href="/">Show All Teams</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ $isActiveShowPlayers ?? '' }}" href="{{ route('player.showAll') }}">Show All
                                    Players</a>
                            </li>

                            @auth

                                @if (Auth::user()->isAdmin())
                                    <li class="nav-item">
                                        <a class="nav-link {{ $isActiveAddPlayer ?? '' }}" aria-current="true"
                                            href="{{ route('adminplayer.add') }}">Add
                                            New Player</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ $isActiveAddTeam ?? '' }}" aria-current="true"
                                            href="{{ route('adminteam.add') }}">Add
                                            New Team</a>
                                    </li>
                                @endif

                                @if (Auth::user()->isTeam())
                                    <li class="nav-item">
                                        <a class="nav-link {{ $isActiveAddTeam ?? '' }}" aria-current="true"
                                            href="{{ route('teamteam.add') }}">Add
                                            New Team</a>
                                    </li>
                                @endif

                                @if (Auth::user()->isPlayer())
                                    <li class="nav-item">
                                        <a class="nav-link {{ $isActiveAddTeam ?? '' }}" aria-current="true"
                                            href="{{ route('playerplayer.add') }}">Add
                                            New Team</a>
                                    </li>
                                @endif

                            @endauth

                        </ul>

                        <ul class="navbar-nav ms-auto">

                            @guest

                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">

                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                    </div>

                                </li>

                            @endguest
                        </ul>

                    </div>

                </div>

            </nav>

            <div class="card-body">

                <h1>{{ $mainTitle }}</h1>

                @yield('content')

            </div>

        </div>

    </div>

</body>

</html>
