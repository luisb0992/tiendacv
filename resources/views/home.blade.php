@extends('layouts.sinfooter')

@section('content')
<div class="jumbotron jumbotron-purple">
    <div class="container">
        <h1 class="text-capitalize">Bienvenido! {{ Auth::user()->name }}</h1>
        <p class="body_personal">Tienda Comercial te permite crear una tienda virtual para que puedas vender tus articulos de forma segura y sin costo alguno. 
        Tambien puedes indagar por el catalago de productos que tenemos disponible para ti.</p>
        @if($usertienda > 0)
            <p><a href="{{ url('/tiendas') }}" class="btn-morado btn-lg">Visitar mi Tienda</a></p>  
        @else
            <p class="body_personal">Si tienes un comercio y quieres vender tus articulos empieza a crear tu tienda YA!</p>
        	<p><a href="{{ url('/tiendas/create') }}" class="btn-morado btn-lg">Crear Tienda</a></p>
        @endif
    </div>
</div>
<div class="jumbotron-gris-claro">
    <div class="container white">
        <h2 class="h1_padding">Nuevos Productos <span class="text-danger">*</span></h2>
        <div class="">
			@foreach($productos as $producto)
            <div class="col-sm-4 col-md-4 col-xs-12" style="border-right: 1px solid #eee;">
                    <!-- <div class="text-lowercase">
                        <div class="">
                            <a href="{{ url('/productos/'.$producto->id) }}" 
                            class="btn btn-link">
                            <span class="text-morado" style="font-size: 14px;">
                                <i class="fa fa-eye"></i> <strong><em>{{ $producto->titulo }}</em></strong>
                            </span>
                            </a>
                        </div>    
                    </div> -->
                    <div class="col-md-4 div-padding" align="center">
                        @if($producto->extension)
                            <a href="{{ url('/productos/'.$producto->id) }}" data-toggle="tooltip" data-placement="top" title="{{ $producto->titulo }}">
                                <img src="{{ url("/productos/images/$producto->id.$producto->extension") }}" alt="imagen" class="img-responsive" width="50">
                            </a>
                        @else
                            <img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-responsive">
                        @endif
                    </div>
                    <div class="col-md-8 div-padding">
                        <p><span class="text-danger">Bsf:</span> {{ $producto->precio_bolivar }} </p>
                        <p><span class="text-primary">USD:</span> {{ $producto->precio_dolar }} </p>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        @if($producto->user->id == Auth::user()->id)

                        @else
                            <p class="">@include('cp.form',['producto' => $producto])</p>
                        @endif
                    </div>
            </div>
        @endforeach
		</div>
    </div>
</div>
@endsection
