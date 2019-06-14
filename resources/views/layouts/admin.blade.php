<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>K-Finance</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/addition.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="wrapper" class="animate">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
            <div class="container-fluid">
                @auth
                    <span class="navbar-toggler-icon leftmenutrigger"></span>
                @endauth
                <a class="navbar-brand" href="{{ url('/') }}">
                 {{--   {{ config('app.name', 'Laravel') }}--}}
                    <span style="color: #1b1e21">K-finance</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    @auth
                    @include('includes.sidebar')
                    @endauth

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @guest
                            <li class="nav-item navedit active">
                                <a class="nav-link" href="{{url('/')}}">{{ __('Home') }}</a>
                            </li>
                            @else
                            <li class="nav-item navedit active">
                                <a class="nav-link" href="{{url('/home')}}">{{ __('Home') }}</a>
                            </li>

                        @endguest


                        <li class="nav-item navedit">
                            <a class="nav-link" href="{{url('/about')}}">{{ __('About') }}</a>
                        </li>

                        <li class="nav-item navedit">
                            <a class="nav-link" href="{{url('/loan')}}">{{ __('Loans') }}</a>
                        </li>

                        <li class="nav-item navedit">
                            <a class="nav-link" href="{{url('/service')}}">{{ __('Services') }}</a>
                        </li>

                        <li class="nav-item navedit">
                            <a class="nav-link" href="{{url('/people')}}">{{ __('People') }}</a>
                        </li>

                        <li class="nav-item navedit">
                            <a class="nav-link" href="{{url('/contact')}}">{{ __('Contact Us') }}</a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item navedit">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                          {{--  <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>--}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4 ">
            @yield('contentAdmin')
        </main>
        @guest
        @include('includes.footer')
        @endguest
        
    </div>
    </div>
</body>
</html>
