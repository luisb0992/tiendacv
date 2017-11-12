@extends('layouts.app')

@section('content')
@if(count($tiendas) > 0)
<div class="jumbotron jumbotron-purple">
	<div class="container body_personal">
		@include('partials.message')
		@foreach($tiendas as $tienda)
		<div class="col-sm-9 col-xs-12">
		    <h2 class="text-capitalize">{{ $tienda->titulo }}</h2>
		    <p><small>{{ $tienda->sub_titulo }}</small></p>
		    <p>
		    	<a href="{{ url('/productos/create') }}" class="btn btn-success btn-lg col-md-4 col-xs-12">
		    	<i class="fa fa-plus" aria-hidden="true"></i>
		    	Agregar Productos
		    	</a>
		    </p>
		</div>
		<div class="col-sm-3 col-xs-12 text-peque">
		    <h2 class="text-capitalize text-center">Configuracion</h2>
	    	<div>
	    		<a href="#modal_edit" class="btn btn-warning btn-lg btn-block"
	    		data-toggle="modal" data-target="#modal_edit" role="button">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		    		Ver y Editar
	    		</a>
	    		@include('partials.modal_edit_tienda',['tiendas' => $tiendas])
	    	</div>
		    	<!-- <p>
		    		@include('tiendas.delete',['tiendas' => $tiendas])
		    	</p> -->
		</div>
	    <hr>
	    @endforeach
	</div>
</div>
<div class="jumbotron jumbotron-gris-claro">
	<div class="container white">
		<h2 class="body_personal">Mis Productos</h2>
		<hr>
		@foreach($productos as $producto)
			<div class="col-sm-6 col-md-6">
			<p class="text-lowercase container h1_padding">{{ $producto->titulo }}</p>
			<div class="col-sm-6 col-md-6">
				<div class="thumbnail">
					@if($producto->extension)
						<img src="{{ url("/productos/images/$producto->id.$producto->extension") }}" alt="imagen" class="img-producto">
					@else
						<img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-producto">
					@endif
				</div>
			</div>
			<div class="col-sm-6 col-md-6">
				<div class="caption text-peque margin-bottom-div">
					<p>
						<a href="{{ url('/productos/'.$producto->id) }}" class="btn btn-primary btn-block">Vista Detallada</a>
						<a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="btn btn-warning btn-block">Editar</a>
						<a href="{{ url('/productos/'.$producto->id) }}" class="btn btn-danger btn-block">Eliminar</a>
					</p>
				</div>
			</div>
			</div>
		@endforeach
	</div>
</div>
@else
<div class="jumbotron jumbotron-purple">
    <div class="container body_personal">
        <h1>Bienvenido! {{ Auth::user()->name }}</h1>
        <p>Tienda Comercial te permite crear una tienda virtual para que puedas vender tus articulos de forma segura y sin costo alguno. Empieza a crear tu tienda y publicar tus productos!</p>
        <p><a href="{{ url('/tiendas/create') }}" class="btn-morado btn-lg">Crear Tienda</a></p>
    </div>
</div>
@endif
@endsection
	