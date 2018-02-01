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
            <div class="col-sm-4 col-xs-12">
                    <div class="row well well-sm" style="border: 1px solid #8133B7; margin: 1px;">
                        <div class="col-sm-12" style="font-size: 10px;">
                            <a href="{{ url('/productos/'.$producto->id) }}" class="text-morado">
                                {{ $producto->titulo }}
                            </a>
                        </div>
                        <div class="col-md-4 div-padding" align="center" style="max-width: 20%; max-height: 20%;">
                            @if($producto->extension)
                                <a href="{{ url('/productos/'.$producto->id) }}" data-toggle="tooltip" data-placement="top" title="{{ $producto->titulo }}">
                                    <img src="{{ url("/productos/images/$producto->id.$producto->extension") }}" alt="imagen" class="img-responsive">
                                </a>
                            @else
                                <img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-responsive" width="50">
                            @endif
                        </div>
                        <div class="col-md-8 div-padding">
                            <p>
                                <span class="h4 text-danger">Bsf: 
                                {{ $producto->precio_bolivar }} </span>
                            </p>
                            <p>
                                <span class="h4 text-primary">USD: 
                                {{ $producto->precio_dolar }} </span>
                            </p>
                        </div>
                        <div class="col-sm-12">
                            @if($producto->user->id == Auth::user()->id)

                            @else
                                <p class="">@include('cp.form',['producto' => $producto])</p>
                            @endif
                        </div>
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
    // PNotify.prototype.options.styling = "bootstrap3";

    // var stack_topleft = {"dir1": "down", "dir2": "right", "push": "top"};
    // var stack_bottomleft = {"dir1": "right", "dir2": "up", "push": "top"};
    // var stack_modal = {"dir1": "down", "dir2": "right", "push": "top", "modal": true, "overlay_close": true};
    // var stack_bar_top = {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0};
    // var stack_bar_bottom = {"dir1": "up", "dir2": "right", "spacing1": 0, "spacing2": 0};
    // var stack_context = {"dir1": "down", "dir2": "left", "context": $("#stack-context")};
</script>
@endsection
