@extends('layouts.app')
@section('content')
	<div class="container white">
		<h1 class="text-capitalize text-center">Tu Carrito de Compras</h1>
				<table class="table table-striped">
					<tr class="text-center">
						<td>
							<div class="col-sm-8 panel panel-morado div-separator-right">
								<div class="panel-heading">Producto</div>
							</div>
							<div class="col-sm-4 panel panel-morado">
								<div class="panel-heading">Precio</div>
							</div>
						</td>
					</tr>
				@foreach($productos as $producto)
					<tr>
						<td>					
							<div class="col-sm-8 div-separator-right">
								 @if($producto->extension)
		                            <img src="{{ url("/productos/images/$producto->id.$producto->extension") }}" alt="imagen" class="img-responsive col-sm-6">
		                        @else
		                            <img src="{{ asset('img/sin_imagen.png') }}" alt="imagen" class="img-responsive col-sm-6">
		                        @endif
		                        <p class="text-primary">{{ $producto->titulo }}</p>
							</div>
							<div class="col-sm-4 text-center">
								<p>{{ $producto->precio_bolivar }} BsF.</p>
								<p>{{ $producto->precio_dolar }} USD.</p>
							</div>
						</td>
					</tr>
				@endforeach
				</table>
				<div class="col-sm-12 text-right div-footer-botonera">
					<p class="text-capitalize text-primary">Total a cancelar</p>
					<p>{{ $totalBSF }} BsF. <a href="" class="btn btn-primary">Pagar</a></p>
					<p>{{ $totalUSD }} USD. <a href="" class="btn btn-primary">Pagar</a></p>
				</div>	
	</div>
	<br><br><br>	
@endsection