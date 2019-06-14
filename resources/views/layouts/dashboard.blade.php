<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="">
    <title>K-Finance</title>


    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <!-- Font-icon css-->

    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}"> --}}
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}" defer></script>
    <script src="{{asset('js/popper.min.js')}}" defer></script>
    <script src="{{asset('js/main.js')}}" defer></script>
    <script src="{{asset('js/custom.js')}}" defer></script>
</head>

<body class="app sidebar-mini rtl">

    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{ url('/home') }}">K-Finance</a>
        <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
            aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown"
                    aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    {{-- <li><a class="dropdown-item" href=""><i class="fa fa-user fa-lg"></i> My Profile</a></li>
                    <li><a class="dropdown-item" href="javascript:void()" data-toggle="modal"
                            data-target="#changepassword"><i class="fa fa-cog fa-lg"></i> Change Password</a></li>
 --}}

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-lg"></i>
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <div id="app">
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">

            @include('includes.sidebar')
        </aside>
        <main class="app-content">


            <div class="row">
                <div class="col-md-12">
                    @yield('content')

                </div>
            </div>


        </main>

    </div>

</body>

</html>