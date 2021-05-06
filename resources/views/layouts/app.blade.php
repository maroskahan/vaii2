<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app" style="">
        <nav id="main" class="navbar navbar-light navbar-expand-md bg-light shadow-sm">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-left"><img src="{{ asset('img/ruvz_logo_admin.png') }}" class="mr-3"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{ route('home') }}">{{ __('Domov') }}</a></li>
                        <li><a class="nav-link" href="{{ route('covid') }}">{{ __('COVID-19') }}</a></li>
                        @foreach(\App\Models\Page::all()->reverse() as $page)
                            @if($page->published)
                                <li><a class="nav-link" href="{{ route('page.show', $page->id) }}">{{ $page->menu_title }}</a></li>
                            @endif
                        @endforeach
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Odhlásiť sa') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="sidenav-backdrop" style="transition: opacity 0.3s ease-out 0s; position: absolute; width: 100%; height: 100%; opacity: 1;"></div>
        <main class="py-4" style="margin-bottom: 50px;">
            @yield('content')
        </main>
    </div>
    @auth
        <footer class="footer bg-light navbar-light fixed-bottom navbar-expand-lg" style="">
            <div class="container">
                <ul class="navbar-nav mr-auto ">
                    <li><a class="nav-link" href="{{ route('admin.index') }}">{{ __('Administrácia') }}</a></li>
                        <li><a class="nav-link" style="color: red;" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            {{ __('Odhlásiť sa') }}
                        </a></li>
                </ul>
            </div>
        </footer>
    @endauth
    @guest
        <footer class="footer bg-light navbar-light fixed-bottom navbar-expand-lg" style="">
            <div class="container">
                <ul class="navbar-nav mr-auto justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Administrácia') }}</a>
                    </li>
                </ul>
            </div>
        </footer>
    @endguest


</body>
</html>
