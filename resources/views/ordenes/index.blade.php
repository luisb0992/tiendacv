@extends('layouts.sinfooter')
@section('content')

<div class="jumbotron jumbotron-gris-medio">
	<div class="container">
		<h2><i class="fa fa-dashboard text-morado"></i> Dashboard</h2>
		<div class="container">
			<h4><i class="fa fa-folder-o text-primary"></i> Ordenes procesadas</h4>
		</div>
		@include('partials.message')
	</div>	
</div>
<div class="container white">
	<div class="div-padding">
		<div class="row h1_padding">
			<div class="col-sm-3"><span class="text-primary h3 border_bottom_blue">{{ $mes }}USD</span><br> Al mes</div>
			<div class="col-sm-3"><span class="text-success h3 border_bottom_blue">{{ $mescount }}</span><br> Ventas</div>
		</div>
		<h4 class="h1_padding">Ventas</h4>
		<table class="table table-striped data-table">
			<thead>
				<tr>
					<td>ID venta</td>
					<td>Comprador</td>
					<td>Direccion</td>
					<td>Nº Guia</td>
					<td>Status</td>
					<td>Fecha Venta</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach($ordenes as $orden)
				<tr>
					<td>{{ $orden->id }}</td>
					<td>{{ $orden->recipient_name }}</td>
					<td>{{ $orden->line1." ".$orden->line2 }}</td>
					<td>{{ $orden->guide_number }}</td>
					<td>{{ $orden->status }}</td>
					<td>{{ $orden->created_at }}</td>
					<td><a href="#" class="btn btn-default">accion</a></td>
				</tr> 
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection