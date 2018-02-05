@extends('layouts.sinfooter')

@section('content')
<div class="jumbotron img_fondo_3">
    <div class="container">
        <h1 class="text-capitalize">Bienvenido(a) {{ Auth::user()->name }}!</h1>
        <p>Tienda Comercial te permite crear una tienda virtual para que puedas vender tus articulos de forma segura y sin costo alguno. 
        Tambien puedes indagar por el catalago de productos que tenemos disponible para ti.</p>
        @if($usertienda > 0)
            <p>
                <a href="{{ url('/tiendas') }}" class="btn-morado btn-lg">Visitar mi Tienda</a> 
            </p>  
        @else
            <p class="">
                <b>Si tienes un comercio y quieres vender tus articulos empieza a crear tu tienda YA!</b>
            </p>
        	<p>
                <a href="{{ url('/tiendas/create') }}" class="btn-morado btn-lg">Crear Tienda</a>
            </p>    
        @endif
    </div>
</div>
<div class="jumbotron-gris-medio">
    <div class="container white">
        <h2 class="h1_padding">Nuevos Productos <span class="text-danger">*</span></h2>
        <div class="row">
			@foreach($productos as $producto)
            <div class="col-sm-3 box-data-1">
                    <div class="" style="margin: 1px; border: solid 0.2px #eee;">
                        <div class="div-padding" align="center">
                            <a href="{{ url('/productos/'.$producto->id) }}" data-toggle="tooltip" data-placement="top" title="{{ $producto->titulo }}">
                                <img style="height: 180px;"

                                    @if($producto->extension)
                                        src="{{ url("/productos/images/$producto->id.$producto->extension") }}"
                                    @else
                                        src="{{ asset('img/sin_imagen.png') }}"
                                    @endif
                                
                                alt="imagen" class="img-responsive">
                            </a>
                        </div>
                        <div style="font-size: 10px;">
                            @if($producto->user->id == Auth::user()->id)
                                <i class="fa fa-user text-success"></i>
                            @endif
                            <a href="{{ url('/productos/'.$producto->id) }}" class="text-morado">
                                {{ $producto->titulo }}
                            </a>
                        </div>
                        <div class="div-padding">
                            <p>
                                <span class="h4 text-danger">Bsf: 
                                {{ $producto->precio_bolivar }} </span>
                            </p>
                            <p>
                                <span class="h4 text-primary">USD: 
                                {{ $producto->precio_dolar }} </span>
                            </p>
                        </div>
                        <!-- <div class="col-sm-12">
                            @if($producto->user->id == Auth::user()->id)

                            @else
                                <p class="">@include('cp.form',['producto' => $producto])</p>
                            @endif
                        </div> -->
                    </div>
                    <br>
            </div>
        @endforeach
		</div>
    </div>
</div>
@endsection
@section('script')
<script>
    $( document ).ready(function() {
        var _dto = '{{$preguntas}}';
        if (_dto > 0) {
            PNotify.prototype.options.styling = "fontawesome";
            PNotify.desktop.permission();
            (new PNotify({
                title: 'Bienvenido',
                text: 'Usted tiene '+_dto+' mensajes sin leer',
                type: 'info',
                desktop: {
                    desktop: true
                }
            })).get().click(function(e) {
                if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target)) return;
                // alert(dto);
            });
        }
        // alert( "se tiro tres" );
    });
</script>
@endsection
