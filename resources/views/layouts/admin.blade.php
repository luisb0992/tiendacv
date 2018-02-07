<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AuraShop') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/estilos_propios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/css/font-awesome.css') }}">
    
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet"> 
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <style type="text/css" media="screen">
    .navbar{
        margin-bottom: 0px;
    }
     html
    {
        position: relative;   
        min-height: 100%;
        min-width: 100%;
    }
    body
    {
        font-family: 'Alegreya', serif;
        margin: 0 0 60px;
        background-color: #fafafa;
    }
    .img_fondo_admin{
        background-image: url("{{ asset('img/admin2.jpg')  }}");
        background-position: center bottom;
        background-repeat: no-repeat;     
    }
    </style>
</head>
<body class="jumbotron-gris-claro">
    <div id="app">
        <nav class="navbar navbar-morado navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <div class="">
                        @if(Auth::check())
                        <a class="navbar-brand a_white" href="{{ url('/home') }}">
                            {{ config('app.name', 'AuraShop') }}
                        </a>
                        @else
                        <a class="navbar-brand a_white" href="{{ url('/') }}">
                            {{ config('app.name', 'AuraShop') }}
                        </a>
                        @endif
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="a_white"><a class="a_white" href="{{ route('login') }}">Login</a></li>
                            <li class="a_white"><a class="a_white" href="{{ route('register') }}">Registro</a></li>
                        @else
                            <li class="dropdown a_white">
                                <a href="#" class="dropdown-toggle a_white text-uppercase" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li class="jumbotron jumbotron-default">
                                    <div class="">
                                        <p class="h1_padding"><a href="#" class="text-primary"><i class="fa fa-user-circle-o"></i> Perfil</a></p>
                                        <a class="btn btn-danger btn-block" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesion
                                        </a>
                                    </div>    
                                        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
    
    <!-- Scripts -->
    
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    @yield('script')
    
</body>
</html>
