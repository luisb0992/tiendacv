@extends('layouts.sinfooter')
@section('content')
	<div class="jumbotron img_fondo_preguntas">
		<div class="container">
			<h2><i class="fa fa-shopping-cart text-morado"></i> Carrito</h2>
		</div>	
	</div>
	<div class="container white">
	<hr>
		@if($productos->count() > 0)
			<h3 class="text-capitalize text-left">Tu Carrito de Compras</h3>
				<table class="table table-striped table-responsive">
					<tr class="text-center">
						<td class="bg-primary">
							<div class="col-sm-8 div-separator-right">
								<div class="">Descripcion</div>
							</div>
							<div class="col-sm-4">
								<div class="">Precio</div>
							</div>
						</td>
					</tr>
					<form class="form_pago" method="POST">
					@foreach($productos as $producto)
					<tr>
						<td>					
							<div class="col-sm-8">
								 @if($producto->extension)
		                            <img src="{{ url("/productos/images/$producto->id.$producto->extension") }}" alt="imagen" class="img-responsive col-sm-2">
		                        @else
		                            <img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-responsive col-sm-2">
		                        @endif
		                        <p class="text-primary">
		                        	{{ $producto->titulo }}
		                        </p>
							</div>
							<div class="col-sm-4 text-center div-separator-right div-separator-left">
								<div class="form-group" align="center">
									<span class="col-sm-4"></span>
									<span class="col-sm-4">
										<select name="cantidad" class="form-control input-sm select_cantidad" onchange="multiplicar()">
											@for($i = 1; $i <= $producto->cantidad; $i++)
											<option value="{{ $i }}">{{ $i }}</option>
											@endfor
										</select>
									</span>	
									<span class="col-sm-4"></span>
									<br>
								</div>
								<div class="col-sm-12">
									<p class="h4">
										<span class="text-danger" id="pecio_producto">{{ $producto->precio_bolivar }} BsF.</span>
										<input type="hidden" class="precio_bolivar" value="{{ $producto->precio_bolivar }}">
										<br>
										<span class="text-primary">{{ $producto->precio_dolar }} USD.</span>
										<input type="hidden" class="precio_dolar" value="{{ $producto->precio_dolar }}">
									</p>
								</div>
							</div>
						</td>
					</tr>
					<input type="hidden" class="id_producto" value="{{ $producto->id }}" name="id_producto">
					@endforeach
					</form>
				</table>
				<br>
				<div class="col-sm-12 text-right div-footer-botonera">
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<button class="btn btn-primary btn-lg" id="btn_procesar_pago" type="button"><i class="fa fa-arrow-circle-right"> Procesar Pago</i></button>
					<!-- <p class="text-capitalize text-primary">Total a cancelar</p>
					<p>{{ $totalBSF }} BsF. <a href="" class="btn btn-danger disabled">Pagar</a></p>
					<p>{{ $totalUSD }} USD. <a href="{{ url('/carrito/pago') }}" class="btn btn-primary">Pagar</a></p> -->
				</div>
		@else
			<div class="col-sm-12">
				<div class='alert alert-info' style='position: fixed center;'>
				    <button type='button' class='close' data-dismiss='alert'>&times;</button>
				    <p>
				    	<i class="fa fa-check-square-o"></i> No Posee productos en su carrito
				    	<b> | <a href="{{ url('/home') }}" class="btn-link"><span class="text-morado">Volver al dashboard</span></a></b>
				    </p>
				</div>
			</div>
		@endif
	</div>
@endsection

@section('script')
	<script>
		$(document).on('change', '.select_cantidad', function(event) {
			event.preventDefault();
			alert($(this).closest('span'))
		});
		// $('.select_cantidad').change(function(event) {
		// 	var precio_bolivar = $('.precio_bolivar').val();
		// 	var precio_dolar = $('.precio_dolar').val();
		// 	var cantidad = $('.select_cantidad').val();
		// 	var result = cantidad * precio_dolar;
		// 		alert(result);
			
		// });
		// 
		$("#btn_procesar_pago").click(function(event) {
			var form = $('.form_pago').serialize();
			var token = $('#token').val();
			var ruta = 'procesarpago';
			$.ajax({
				url: ruta,
				headers: {'X-CSRF-TOKEN': token},
				type: 'POST',
				dataType: 'JSON',
				data: form,
			})
			.done(function(data) {
				console.log("pago en proceso");
				
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				// alert(form);	
				console.log("complete");
			});
		});
	</script>
@endsection