@extends('layouts.app')
@section('content')
	<div class="jumbotron">
		<div class="container body_personal white">
			@include('partials.message')
			<div><h3>Realizar Cambios</h3></div>
			<hr>
			<div class="container">@include('productos.form_edit', ['productos' => $productos])</div>
		</div>
	</div>	
@endsection