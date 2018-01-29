@extends('layouts.app_login')

@section('content')
<div class="jumbotron  div-height img_fondo">
    <div class="container">
        <!-- Bienvenida -->
        <div class="col-sm-8 text-justify">
            <h2>Bienvenido!</h2>
            <p>
                <b>Tienda Comercial</b> 
                te permite crear una tienda virtual<br> para que puedas vender tus articulos
                 de forma segura<br> y sin costo alguno. 
                 <br><br> 
                 <b>Empieza a <a href="{{ route('register') }}" class="text-morado">crear</a> tu tienda y publicar tus productos!</b>
            </p>  
        </div>
        <div class="col-sm-2 pull-right">
            <img src="{{ asset('img/carrito_1.png') }}" class="img-responsive">
        </div>
    </div>
</div>
<div class="jumbotron">
    <div class="container">
    <!-- Iniciar session -->
            <div class="col-sm-6 col-sm-offset-3 gris_claro login-flotante">
                <h3 class="text-capitalize col-sm-12 text-center">¿No Posees Una Cuenta? 
                <a href="{{ route('register') }}" class="text-morado">Registrate</a></h3>
                 
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <label for="email" class="control-label">E-Mail</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" class="" {{ old('remember') ? 'checked' : '' }}>
                                    Recordar
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="col-md-12 text-center">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn-morado btn-lg btn-block">
                                Login
                            </button>
                            <br>
                        </div>
                    </div>
                </form>
            </div>
    </div>
</div>                 
@endsection
