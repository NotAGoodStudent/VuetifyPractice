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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: transparent">
            <div class="container-fluid">
                <img class="logo" src="{{Storage::url('imgs/front/logo.png')}}" style="height: 50px" alt="">
                <!-- Windows-->
                @if(auth()->check())
                    <a style="color: white; font-weight: bold" class="navbar-brand" href="{{route('home')}}" style="margin-left: 10px">Fit++</a>
                @else
                    <a style="color: white; font-weight: bold" class="navbar-brand" href="{{route('index')}}" style="margin-left: 10px">Fit++</a>
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(auth()->check())
                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{route('editProfile')}}">
                                        <span class="icon">
                                        <i class="fas fa-user-circle" style="color:orange;font-weight: bold; margin-right: 3px"></i>
                                        </span>Edit profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <span class="icon">
                                        <i class="fas fa-sign-out-alt text-danger" style="font-weight: bold; margin-right: 3px"></i>
                                        </span>{{ __('Logout') }}</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
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
<style>
    body{
        background-color: #12232E	;
    }
    .dropdown-item{
        color: #fff;
    }

    .dropdown-item:hover{
        color: #F5461F;
        background-color: transparent;
        border-bottom: 1px solid #F5461F;
    }
</style>
