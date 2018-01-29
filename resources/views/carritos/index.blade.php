@extends('layouts.sinfooter')
@section('content')
	<div class="container white">
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
				@foreach($productos as $producto)
					<tr>
						<td>					
							<div class="col-sm-8 div-separator-right">
								 @if($producto->extension)
		                            <img src="{{ url("/productos/images/$producto->id.$producto->extension") }}" alt="imagen" class="img-responsive col-sm-2">
		                        @else
		                            <img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-responsive col-sm-2">
		                        @endif
		                        <p class="text-primary">{{ $producto->titulo }}</p>
							</div>
							<div class="col-sm-4 text-center">
								<p>
									<small class="pull-left"><i>x1</i></small>
									<span class="text-danger">{{ $producto->precio_bolivar }} BsF.</span>
								</p>
								<p>
									<small class="pull-left"><i>x1</i></small>
									<span class="text-primary">{{ $producto->precio_dolar }} USD.</span>
								</p>
							</div>
						</td>
					</tr>
				@endforeach
				</table>
				<div class="col-sm-12 text-right div-footer-botonera">
					<p class="text-capitalize text-primary">Total a cancelar</p>
					<p>{{ $totalBSF }} BsF. <a href="" class="btn btn-danger disabled">Pagar</a></p>
					<p>{{ $totalUSD }} USD. <a href="{{ url('/carrito/pago') }}" class="btn btn-primary">Pagar</a></p>
				</div>	
	</div>
	<br><br><br>	
@endsection