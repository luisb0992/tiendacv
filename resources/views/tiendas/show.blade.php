@extends('layouts.sinfooter')
@section('content')
	<div class="container white">
		<h2>{{ $tienda->titulo }}</h2>
		<div class="col-sm-12 col-md-12">
			<div class="container">
				<p>{{ $tienda->sub_titulo }}</p>
				<p>RIF {{ $tienda->RIF }}</p>
			</div>
		</div>
		<h2 class="text-morado">Contactos</h2>
		<div class="col-sm-12 col-md-12">
			<div class="container">
				<p>Correo: {{ $tienda->correo }}</p>
				<p>Telefonos: {{ $tienda->telefono_1 }} | {{ $tienda->telefono_2 }}</p>
			</div>
		</div>
	</div>
	<div class="container white">
		<h2 class="body_personal text-morado">Productos</h2>
		@foreach($tienda->user->productos as $producto)
			<div class="col-sm-2 col-md-2">
				<div>
					<div class="thumbnail" align="center">
						<div>
						@if($producto->extension)
							<a href="{{ url('/productos/'.$producto->id) }}" 
							class="btn btn-primary btn-block">
								<img width="150px" height="100px" src="{{ url("/productos/images/$producto->id.$producto->extension") }}" alt="imagen" class="img-producto img-responsive">
							</a>
						@else
							<img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-producto">
						@endif
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="container white">
		<h2 class="bosy_personal text-morado">Calificaciones</h2>
	</div>	
@endsection