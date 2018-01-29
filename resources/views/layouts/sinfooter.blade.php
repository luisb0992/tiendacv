<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/estilos_propios.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icons/css/font-awesome.css') }}">

    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('plugins/jquery_datepicker/jquery-ui.css')}}">

    <!-- star rating -->
    <link rel="stylesheet" href="{{asset('plugins/star_rating/dist/star-rating.css')}}">

    <!-- notificaciones menu -->
    <link rel="stylesheet" href="{{ asset('plugins/notification_menu/css/style_light.css') }}">

    <!-- pnotify -->
    <link href="{{ asset('plugins/pnotify/pnotify.custom.min.css') }}" media="all" rel="stylesheet" type="text/css" />

    <!-- lightbox imagen -->
    <link href="{{ asset('plugins/lightbox/dist/ekko-lightbox.css') }}" rel="stylesheet"/>
    
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alegreya" rel="stylesheet"> 
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <!-- <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>     -->

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
    .img_fondo_2{
        background-image: url("{{ asset('img/e-commerce_2.jpg')  }}");
        background-position: center bottom;
    }
    .img_fondo_3{
        background-image: url("{{ asset('img/fondo_3.jpg')  }}");
        background-position: center bottom;
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
                    <div class="n">
                        @if(Auth::check())
                        <a href="{{ url('/carrito') }}" class="navbar-brand a_white">
                            <i class="fa fa-shopping-cart"></i>
                            Mi carrito 
                            <span class="badge_personal">
                                {{ $carrito->productoSize() }}
                            </span>
                        </a>
                        <a href="" class="navbar-brand a_white">|</a>
                        <a href="{{ url('/home') }}" class="navbar-brand a_white">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </a>
                        @else
                        <a class="navbar-brand a_white" href="{{ url('/') }}">
                            <i class="fa fa-"></i>
                            {{ config('app.name', 'Tienda Comercial') }}
                        </a>
                        @endif
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="a_white"><a class="a_white" href="{{ route('login') }}">Login</a></li>
                            <li class="a_white"><a class="a_white" href="{{ route('register') }}">Registro</a></li>
                        @else
                            <li id="messages" class="a_white">
                                <a href="#" class="a_white"> 
                                    <i class="fa fa-envelope-o">
                                        <span class="badge" style="font-size: 9px; background-color: #7E0404; margin-bottom: 8px;">
                                            {{ $preguntas }}
                                        </span>
                                    </i>
                                </a>
                            </li>
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
    <script src="{{ asset('plugins/jquery_datepicker/jquery-ui.js') }}"></script>
    <script src="{{ asset('plugins/star_rating/dist/star-rating.min.js') }}"></script>
    <script src="{{ asset('plugins/pnotify/pnotify.custom.min.js') }}"></script>
    <script src="{{ asset('plugins/lightbox/dist/ekko-lightbox.js') }}"></script>

    @yield('script')
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
        });
    </script>
    
</body>
</html>
