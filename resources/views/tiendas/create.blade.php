@extends('layouts.sinfooter')
@section('content')
	<div class="jumbotron">
		<div class="container body_personal white">
			@include('partials.message')
			<div class="div-padding-left-right"><h3>Rellene el siguiente formulario</h3></div>
			<hr>
			<div class="div-padding-left-right">@include('tiendas.form', ['tiendas' => $tiendas])</div>
		</div>
	</div>
@endsection