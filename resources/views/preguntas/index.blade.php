@extends('layouts.sinfooter')
@section('content')
<div class="jumbotron jumbotron-gris-claro img_fondo_preguntas">
	<div class="container">
		@include('partials.message')
		<h2><i class="fa fa-envelope-o text-morado"></i> Preguntas</h2>
	</div>
</div>
<hr>
<div class="container white">
	@if($questions->count() == 0)
		<div class='alert alert-info' style='position: fixed center;'>
		    <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    <p>
		    	<i class="fa fa-check-square-o"></i> No tiene preguntas pendientes
		    	<b> | <a href="{{ url('/home') }}" class="btn-link"><span class="text-morado">Volver al dashboard</span></a></b>
		    </p>
		</div>
	@else
		<span id="msj_res" style="display: none;">
			<div class='alert alert-success' style='position: fixed center;'>
			    <button type='button' class='close' data-dismiss='alert'>&times;</button>
			    <p><i class='fa fa-check'></i> Respondida</p>
			</div>
		</span>
		@foreach($questions as $pre)
		<form id='form_res_{{ $pre->id }}'>
			<div class="panel panel-morado">
				<div class="panel-heading">
					<h5 class="text-capitalize">
						<span class="a_white"> {{ $pre->producto->titulo }}</span>
						<span class="pull-right h5" style="background-color: #BD0000; padding: 1em; margin-top: -2em">
							<i class="fa fa-user-o"></i> {{ $pre->user->name." ".$pre->user->ape }} 
						</span>
					</h5>
				</div>
				<div class="panel-body border_total_oscuro">
					<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
					<input type="hidden" name="producto_id" id="producto_id" value="{{ $pre->producto_id }}">
					<p><i class="fa fa-inr"></i> {{ $pre->pregunta }}</p>
					<div class="col-sm-12">
						<textarea name="respuesta" placeholder="Respuesta..." class="text_res col-sm-12"></textarea>
					</div>
					<div class="col-sm-12"><br></div>
					<div class="col-sm-12">
						<button type='button' onclick='RespuestaPro(this);' id='btn_res' class='btn btn-primary' value="{{ $pre->id }}">Responder</button>
						<span id="reload_2" style="display: none;"><i class="fa fa-spinner fa-pulse fa-2x fa-fw text-danger"></i></span>
					</div>
				</div>
			</div>
		</form>
		@endforeach
	@endif
</div>
@endsection

@section('script')
	<script src="{{ asset('js/tienda.js') }}"></script>
@endsection
	