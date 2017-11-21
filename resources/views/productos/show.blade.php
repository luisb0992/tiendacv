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
		@include('partials.msj_ajax')
		<h2 class="body_personal">
			<strong class="badge_personal_2">{{ $count_coment }}</strong> 
			<span class="text-morado">@if($count_coment == 1) Comentario @else Comentarios @endif</span> 
			<small>
				<a href="#comentario" class="btn btn-link text-primary" data-toggle="modal" data-target="#comentario" role="button">
					<i class="fa fa-plus-square"></i> Nuevo
				</a>
			</small>
			<span id="reload" style="display: none;" align="right" class="text-right">
				<i class="fa fa-spinner fa-pulse fa-fw text-success"></i>
			</span> 
		</h2>
		<div class="list-group">
				@if($count_coment == 1)
					<a class="list-group-item">
						<h4 class="list-group-item-heading">{{ $comentarios->users->name.' '.$comentarios->users->ape }}</h4>
						<p class="list-group-item-text">{{ $comentarios->descripcion }}</p>
						<p class="list-group-item-text">{{ $comentarios->calificacion->puntaje }}</p>
					</a>
					<br>
				@else	
					@foreach($comentarios as $coment)
						<a class="list-group-item">
							<h4 class="list-group-item-heading">{{ $coment->users->name.' '.$coment->users->ape }}</h4>
							<p class="list-group-item-text">{{ $coment->descripcion }}</p>
							<p class="list-group-item-text">{{ $coment->calificacion->puntaje }}</p>
						</a>
						<br>
					@endforeach
				@endif
		</div>	
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
	@include('comentarios.modal_comentario')
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
<script>

	$(document).ready(function() {

		// manejo de calificaciones

		$( '#star-rating' ).starrating({
			clearable : true,
			initialText: "Click para calificar",
			onClick : null,
			showText : true,
		});
		
		// funcion para recargar
		function reload_pag(){
	    	location.reload();
	    }

	    // click en el boton
		$("#btn_coment").click(function(e) {
			e.preventDefault();
			var btn = $("#btn_coment");
			var icon = $(".icon_fa");
			var comentario = $("#coment").val();
			var producto_id = $("#producto_id").val();
			var puntaje = $(".puntaje").val();
			var token = $("#token").val();
			icon.addClass("fa fa-spinner fa-pulse fa-fw");
			btn.text('Espere...');

			// metodo ajax
			$.ajax({
				headers: {'X-CSRF-TOKEN': token},
				url: '../comentarios',
				type: 'POST',
				dataType: 'JSON',
				data: {descripcion: comentario, producto_id: producto_id, puntaje: puntaje},
			})
			.done(function(data) {
				// console.log(data);
				$("#comentario").modal('toggle');
			    $("#mensaje-done").fadeIn(1000,'linear');
			    $("#done_done").text("Creado! Espere unos segundos para mostrar su comentario....");
			    $("#reload").fadeIn('slow/400/fast');
			    icon.removeClass("fa fa-spinner fa-pulse fa-fw");
				btn.text('Enviar');
			    setTimeout(reload_pag, 5000);
			})
			.fail(function(error) {
				console.log(error.responseJSON);
				// $("#comentario").modal('toggle');
			    $("#modal-fail").fadeIn(800,'linear');
			    $("#modal_fail_fail").text(error.responseJSON.descripcion[0]);
			    icon.removeClass("fa fa-spinner fa-pulse fa-fw");
				btn.text('Enviar');
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});
</script>
@endsection