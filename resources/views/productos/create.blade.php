@extends('layouts.sinfooter')
@section('content')
	<div class="jumbotron">
		<div class="container body_personal white">
			@include('partials.message')
			<div><h3>Rellene los siguientes datos</h3></div>
			<hr>
			<div class="container">@include('productos.form', ['productos' => $productos])</div>
		</div>
	</div>	
@endsection