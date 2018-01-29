@extends('layouts.sinfooter')
@section('content')

<div class="jumbotron jumbotron-gris-medio">
	<div class="container">
		<h2>Orden Procesada <i class="fa fa-check text-success"></i></h2>
		@include('partials.message')
	</div>	
</div>
<div class="container white">
	<div class="div-padding">
			<h3 class="bg-primary div-padding">Tu pago fue procesado con exito! <span class="text-morado">{{ $carrito->status }}</span></h3>
			<p><span class="text-morado">Detalles de envio</span> <i class="fa fa-arrow-down text-primary"></i></p>
			<div class="row div-padding">
				<div class="col-sm-2">Correo: </div>
				<div class="col-sm-10">{{ $orden->email }}</div>
			</div>

			<div class="row div-padding">
				<div class="col-sm-2">Direccion: </div>
				<div class="col-sm-10">{{ $orden->line1." ".$orden->line2 }}</div>
			</div>

			<div class="row div-padding">
				<div class="col-sm-2">Codigo Postal: </div>
				<div class="col-sm-10">{{ $orden->postal_code }}</div>
			</div>

			<div class="row div-padding">
				<div class="col-sm-2">Ciudad: </div>
				<div class="col-sm-10">{{ $orden->city }}</div>
			</div>

			<div class="row div-padding">
				<div class="col-sm-2">Localidad: </div>
				<div class="col-sm-10">{{ "$orden->state, $orden->country_code" }}</div>
			</div>
			<hr>
			<div class="text-center">
				<!-- <a href="{{ url('/compras/'.$carrito->customid) }}" class="btn btn-lg btn-morado">Finalizar</a> -->
				<a href="{{ url('/home') }}" class="btn btn-lg btn-primary">Volver al dashboard</a>
			</div>
		
	</div>
</div>
@endsection