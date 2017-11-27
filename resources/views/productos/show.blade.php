@extends('layouts.sinfooter')
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
					</div>
					<p class="text-capitalize">
						@if($producto->user->id == Auth::user()->id)

						@else
							<small>
								<a href="#realizar_preguntas" class="btn btn-success btn-lg btn-block" 
								data-toggle="modal" data-target="#realizar_preguntas" role="button">
									Hacer una pregunta <i class="fa fa-question-circle"></i>
								</a>
							</small>
							@include('preguntas.modal_preguntas')
							@include('cp.form',['producto' => $producto])
						@endif
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container white">

		<!-- descripcion del producto -->
		<h2 class="body_personal text-morado">Descripcion</h2>
		<hr>
		<p class="text-justify container">{{ $producto->descripcion }}</p>
		<hr>
		@include('partials.msj_ajax')

		<!-- cantidad de comentarios y crear nuevo-->
		<div class="">
			<h2 class="body_personal">
				<span class="">
					<span class="text-morado">@if($count_coment == 1) Comentario @else Comentarios @endif</span>
					<strong class="badge_personal_2">({{ $count_coment }})</strong> 
				</span>
				<span style="color:#CACACA;">|</span> 
				@if($producto->user->id != Auth::user()->id)
				<small>
					<a href="#comentario" class="btn-link" data-toggle="modal" data-target="#comentario" role="button">
						<i class="fa fa-plus-square"></i> Nuevo
					</a>
				</small>
				@include('partials.reload')
				@include('comentarios.modal_comentario')
				@endif
			</h2>
		</div>

		<!-- leer comentarios y su calificacion -->
		<div class="list-group">
				@if($count_coment == 1)
					<a class="list-group-item">
						<h4 class="list-group-item-heading">
							{{ $comentarios->users->name.' '.$comentarios->users->ape }} 
							<span style="color:#CACACA;">|</span>
							<span>{{ $comentarios->calificacion->puntaje }}</span>
							<i class="fa fa-star" style="color: #EBD413;"></i>
						</h4>
						<p class="list-group-item-text"><i>"{{ $comentarios->descripcion }}"</i></p>
					</a>
					<br>
				@else	
					@foreach($comentarios as $coment)
						<a class="list-group-item">
							<h4 class="list-group-item-heading">
								{{ $coment->users->name.' '.$coment->users->ape }}
								<span style="color:#CACACA;">|</span>
								<span>{{ $coment->calificacion->puntaje }}</span>
								<i class="fa fa-star" style="color: #EBD413;"></i>
							</h4>
							<p class="list-group-item-text"><i>"{{ $coment->descripcion }}"</i></p>
						</a>
					@endforeach
				@endif
		</div>	
	</div>
	
	<!-- informacion de la tienda -->
	<div class="jumbotron-gris-medio">
		<div class="container">
			<h2>
				<a href="{{ url('/tiendas/'.$producto->user->tienda->id) }}" class="text-morado">
					{{ $producto->user->tienda->titulo }}
				</a>
			</h2>
			<em>RIF: {{ $producto->user->tienda->RIF }}</em>
			<p>{{ $producto->user->tienda->sub_titulo }}</p>
		</div>
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

@section('script')
	<script src="{{ asset('js/show_producto.js') }}"></script>
@endsection