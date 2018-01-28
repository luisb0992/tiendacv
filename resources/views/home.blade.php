@extends('layouts.sinfooter')

@section('content')
<div class="jumbotron jumbotron-purple">
    <div class="container">
        <h3 class="text-capitalize">Bienvenido {{ Auth::user()->name }}!</h3>
        <p class="body_personal">Tienda Comercial te permite crear una tienda virtual para que puedas vender tus articulos de forma segura y sin costo alguno. 
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
<div class="jumbotron-gris-claro">
    <div class="container white">
        <h2 class="h1_padding">Nuevos Productos <span class="text-danger">*</span></h2>
        <div class="">
			@foreach($productos as $producto)
            <div class="col-sm-3 col-md-3 col-xs-12">
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
                    <div class="row well well-sm" style="border: 1px solid #8133B7; margin: 1px;">
                        <div class="col-md-4 div-padding" align="center">
                            @if($producto->extension)
                                <a href="{{ url('/productos/'.$producto->id) }}" data-toggle="tooltip" data-placement="top" title="{{ $producto->titulo }}">
                                    <img height="10px" src="{{ url("/productos/images/$producto->id.$producto->extension") }}" alt="imagen" class="img-responsive">
                                </a>
                            @else
                                <img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-responsive" width="50">
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
