@extends('layouts.app_login')

@section('content')
<div class="jumbotron jumbotron-purple div-height">
    <div class="container">
        <h1 class="text-center">Registrate para que puedas vender o comprar productos</h1>
    </div>
</div>
<div class="jumbotron">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 gris_claro registro-flotante">
            <h3 class="text-capitalize col-sm-12 text-center">
                Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-morado">Inicia Sesion</a>
            </h3>
            <hr>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="{{ $errors->has('name') ? ' has-error' : '' }}">

                    <div class="col-md-12">
                        <label for="name">Nombre</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="{{ $errors->has('ape') ? ' has-error' : '' }}">

                    <div class="col-md-12">
                        <label for="ape">Apellido</label>
                        <input id="ape" type="text" class="form-control" name="ape" value="{{ old('ape') }}" required>

                        @if ($errors->has('ape'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ape') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="col-md-12">
                        <label for="email">E-Mail</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                    <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <br>
                    </div>
                </div>

                <div class="">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn-morado btn-lg btn-block">
                            Registrarse
                        </button>
                        <br><br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
