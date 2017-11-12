@extends('layouts.app')
@section('content')
	<div class="jumbotron jumbotron-purple">
		<div class="container white">
			<div class="col-sm-12 col-md-12">
				<h2>{{ $tienda->titulo }}</h2>
				<div class="container">
					<p>{{ $tienda->sub_titulo }}</p>
					<p>RIF {{ $tienda->RIF }}</p>
				</div>
				<br>
				<h2>Contactos</h2>
				<div class="container">
					<p>Correo: {{ $tienda->correo }}</p>
					<p>Telefonos: {{ $tienda->telefono_1 }} | {{ $tienda->telefono_2 }}</p>
				</div>
			</div>
		</div>
	</div>
	<div class="container white">
		<h2 class="body_personal">Productos</h2>
		<hr>
		@foreach($tienda->user->productos as $producto)
			<div class="col-sm-3 col-md-3 div-padding" style="border: solid 1px #eee;">
				<p class="text-lowercase h1_padding text-peque">
					<b><em>{{ $producto->titulo }}</em></b>
				</p>
				<div>
					<div class="thumbnail" align="center">
						<div style="width: 300px;height: 120px;">
						@if($producto->extension)
							<img src="{{ url("/productos/images/$producto->id.$producto->extension") }}" alt="imagen" class="img-producto">
						@else
							<img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-producto">
						@endif
						</div>
					</div>
					<div class="caption text-peque">
						<p class="text-right">{{ $producto->precio_bolivar }} Bsf</p>
						<p class="text-right">{{ $producto->precio_dolar }} USD</p>
						<p>
							<a href="{{ url('/productos/'.$producto->id) }}" 
							class="btn btn-primary btn-block">Ver</a>
						</p>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<br><br><br>
@endsection