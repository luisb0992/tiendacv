@extends('layouts.app')
@section('content')
@if($producto)
	<div class="jumbotron jumbotron-purple">
		<div class="container">
			<div class="col-sm-8 col-md-8">
				<h2 class="body_personal">{{ $producto->titulo }}</h2>
				<hr>
				@if($producto->extension)
					<img width="350px" height="300px" src="{{ url("/productos/images/$producto->id.$producto->extension") }}" 
					class="img-rounded center-block img-responsive">
				@else
					<img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-rounded center-block img-responsive" width="350px" height="300px">
				@endif
			</div>
			<div class="col-sm-4 col-md-4">
				<h2>&nbsp;</h2>
				<hr>
				<div class="container white">
					<h4 class="text-capitalize">
						Precio
					</h4>
					<div class="container">
						<p>{{ $producto->precio_bolivar }} <span class="text-danger">BsF</span></p>
						<p>{{ $producto->precio_dolar }} <span class="text-primary">USD</span></p>
					</div>	
					<h4 class="text-capitalize">metodos de pago</h4>
					<div class="container">
						<p class="text-info"><i class="fa fa-users"></i>Mercado Pago</p>
						<p class="text-primary"><i class="fa fa-paypal"></i>Paypal</p>
						<p class="text-capitalize">acordar con el vendedor <span class="text-primary"><i class="fa fa-user"></i></span></p>
					</div>
					<p class="text-capitalize">
						@if($producto->user->id == Auth::user()->id)

						@else
							@include('cp.form',['producto' => $producto])
						@endif
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container white">
		<h2 class="body_personal">Descripcion</h2>
		<hr>
		<p class="text-justify">{{ $producto->descripcion }}</p>
		<hr>
		<h2 class="body_personal">Comentarios</h2>
		<p>...</p>
	</div>
	
	<div class="container jumbotron-gris-medio">
		<h2>
			<a href="{{ url('/tiendas/'.$producto->user->tienda->id) }}" class="text-morado">
				{{ $producto->user->tienda->titulo }}
			</a>
		</h2>
		<em>RIF: {{ $producto->user->tienda->RIF }}</em>
		<p>{{ $producto->user->tienda->sub_titulo }}</p>
		<br><br><br>
	</div>
@else
	<div class="jumbotron jumbotron-purple">
		<div class="container">
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h2>Ooops! este producto no existe o fue vendido :/</h2>
			</div>
		</div>
	</div>
@endif
@endsection