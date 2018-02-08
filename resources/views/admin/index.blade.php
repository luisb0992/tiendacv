@extends('layouts.admin')
@section('content')
<div class="jumbotron jumbotron-gris-claro img_fondo_admin">
	<div class="container">
		<h2><i class="fa fa-user text-morado"></i> Bienvenido Admin</h2>
	</div>
</div>
<hr>
<div class="container white">
	<i class="fa fa-info-circle text-info"></i>
		<small> 
			Aqui podras ver los ultimos avances en <span class="text-morado">AuraSHop</span>
		</small>
	<div class="row">
		<div class="col-sm-4 box-data-1 div-padding" style="border: solid 0.5px #eee">
			<div class="col-sm-6">
				<img src="{{ asset('img/icon_venta_2.png') }}" alt="icono" class="img-responsive">
			</div>
			<div class="col-sm-6 text-center">
				<span class="text-morado text-center h4">Tiendas registradas</span>
				<br>
				<span class="text-center border_bottom_blue h3">
					<br>
					{{ $tiendas }}
				</span>
			</div>
		</div>
		<div class="col-sm-4 box-data-1 div-padding" style="border: solid 0.5px #eee">
			<div class="col-sm-6" style="height: 115px">
				<br>
				<i class="fa fa-shopping-cart fa-5x col-sm-6 text-success"></i>
			</div>
			<div class="col-sm-6 text-center">
				<span class="text-morado text-center h4">Productos</span>
				<br>
				<span class="text-center border_bottom_blue h3">
					<br>
					{{ $productos }}
				</span>
			</div>
		</div>
		<div class="col-sm-4 box-data-1 div-padding" style="border: solid 0.5px #eee">
			<div class="col-sm-6" style="height: 115px">
				<br>
				<i class="fa fa-list fa-5x col-sm-6 text-primary"></i>
			</div>
			<div class="col-sm-6 text-center">
				<span class="text-morado text-center h4">Ordenes Completadas</span>
				<br>
				<span class="text-center border_bottom_blue h3">
					<br>
					{{ $ordenes }}
				</span>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-4 box-data-1 div-padding" style="border: solid 0.5px #eee">
			<div class="col-sm-6" style="height: 115px">
				<br>
				<i class="fa fa-users fa-5x col-sm-6 text-danger"></i>
			</div>
			<div class="col-sm-6 text-center">
				<span class="text-morado text-center h4">Usuarios</span>
				<br>
				<span class="text-center border_bottom_blue h3">
					<br>
					{{ $users }}
				</span>
			</div>
		</div>
		<div class="col-sm-4 box-data-1 div-padding" style="border: solid 0.5px #eee">
			<div class="col-sm-6" style="height: 115px">
				<br>
				<i class="fa fa-question-circle fa-5x col-sm-6 text-info"></i>
			</div>
			<div class="col-sm-6 text-center">
				<span class="text-morado text-center h4">Preguntas</span>
				<br>
				<span class="text-center border_bottom_blue h3">
					<br>
					{{ $preguntas }}
				</span>
			</div>
		</div>
		<div class="col-sm-4 box-data-1 div-padding" style="border: solid 0.5px #eee">
			<div class="col-sm-6" style="height: 115px">
				<br>
				<i class="fa fa-star-o fa-5x col-sm-6 text-warning"></i>
			</div>
			<div class="col-sm-6 text-center">
				<span class="text-morado text-center h4">Calificaciones</span>
				<br>
				<span class="text-center border_bottom_blue h3">
					<br>
					{{ $calificaciones }}
				</span>
			</div>
		</div>
	</div>
</div>
@endsection

	