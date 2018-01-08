@extends('layouts.sinfooter')
@section('content')
@if(count($tiendas) > 0)
<div class="jumbotron jumbotron-red">
	<div class="container">
		@include('partials.message')
		@foreach($tiendas as $tienda)
		<div class="col-sm-9 col-xs-12">
		    <h2 class="text-capitalize"> <i class="fa fa-home"></i> {{ $tienda->titulo }}</h2>
		    <p>
		    	<small><i>{{ $tienda->sub_titulo }}</i></small><br>
		    	<small>{{ $tienda->letra }} - {{ $tienda->RIF }}</small>
		    </p>
		</div>
		<div class="col-sm-3 col-xs-12 text-peque">
		    <h2 class="text-capitalize text-center">Configuracion</h2>
	    	<div class="text-center">
	    		<a href="#modal_edit" class="btn btn-warning btn-lg btn-block"
	    		data-toggle="modal" data-target="#modal_edit" role="button">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		    		Editar
	    		</a>
	    	</div>
	    	@include('partials.modal_edit_tienda',['tiendas' => $tiendas])
		    	<!-- <p>
		    		@include('tiendas.delete',['tiendas' => $tiendas])
		    	</p> -->
		</div>
	    <hr>
	    @endforeach
	</div>
</div>
<div class="jumbotron jumbotron-gris-claro">
	<div class="container white">
		<h3 class="">
			Mis Productos <span class="badge_personal_3">({{ $productos->count() }})</span> | 
			<a href="{{ url('/productos/create') }}" class="btn btn-morado a_white">
		    	<i class="fa fa-plus a_white" aria-hidden="true"></i> Nuevo
		    </a>
		    @if($productos->count() > 0)
		    	<div class="pull-right">
		    	<span class="badge_personal_preguntas_2" style="position: absolute;">
		    		{{ $total_preguntas }}
		    	</span>	
		    		&nbsp;&nbsp;&nbsp;Mensajes 
		    	</div>
		    @endif
		    <hr>
		</h3>
		@foreach($productos as $producto)
				<div class="row well well-sm" style="margin-bottom: 0">
					<div class="col-sm-2"></div>
					<div class="col-sm-10 text-left" style="border-bottom: 1px solid #8133B7">
						<h5 class="text-uppercase">
							<span>{{ $producto->titulo }}</span>
						</h5>
					</div>
					<div class="col-sm-2" style="border-right: 1px solid #8133B7;">
						
							@if($producto->extension)
								<img src="{{ url("/productos/images/$producto->id.$producto->extension") }}" 
								alt="imagen" class="img-responsive" width="80">
							@else
								<img src="{{ asset('img/sin_imagen.png') }}" width="50" alt="imagen" class="img-producto img-responsive">
							@endif
					</div>
					<div class="col-sm-10 text-left padding_top_sep">
						<ul class="list-unstyled nav-pills">
							<li class="dropdown">
	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	                                <i class="fa fa-gear"></i> <span class="caret"></span>
	                            </a>

	                            <ul class="dropdown-menu" role="menu">
	                                <li class="text-primary">
	                                	<a href="{{ url('/productos/'.$producto->id) }}">
	                                		<i class="fa fa-eye"></i>
	                                		Vista Detallada
	                                	</a>
	                                </li>
	                                <li class="text-warning">
	                                	<a href="{{ url('/productos/'.$producto->id.'/edit') }}">
	                                		<i class="fa fa-arrow-up"></i>	
	                                		Editar
	                                	</a>
	                                </li>
	                                <li class="text-danger">
	                                	<a href="{{ url('/productos/'.$producto->id) }}">
	                                		<i class="fa fa-trash"></i>
	                                		Eliminar
	                                	</a>
	                                </li>
	                            </ul>
	                        </li>
	                        <li>&nbsp;  &nbsp;</li>
	                        <li>
	                        	<span>
	                        		@if($producto->preguntas($producto->id) == 0)
			                    	<a href="#" data-toggle="tooltip" data-placement="top" title="Preguntas sin responder" 
			                    		style="text-decoration: none; color: #000;">
			                    		<span class="badge_personal_preguntas_1">{{ $producto->preguntas($producto->id) }}</span>
			                    		<i class="fa fa-question-circle-o"></i>
			                    	</a>
			                    	@else
			                    	<button type="button" class="btn-link" data-toggle="modal" data-target="#buscar_preguntas" 
			                    		role="button" id="btn_pre" value="{{ $producto->id }}" onclick="PreguntasPro(this);">
			                    		<span class="badge_personal_preguntas_2" data-toggle="tooltip" data-placement="top" title="Preguntas sin responder">{{ $producto->preguntas($producto->id) }}</span>
			                    		<i class="fa fa-question-circle-o text-danger"></i>
			                    	</button>
			                    	@include("tiendas.modal_buscar_preguntas")
			                    	@endif
			                    </span>
	                        </li>
	                    </ul>
					</div>
				</div>
		@endforeach
	</div>
</div>
@else
<div class="jumbotron jumbotron-red">
    <div class="container body_personal">
        <h1> Vaya {{ Auth::user()->name }}!</h1>
        <p>Al parecer no posees una tienda registrada, ¿deseas crear una?</p>
        <p><a href="{{ url('/tiendas/create') }}" class="btn-morado btn-lg">Crear Tienda ya!</a></p>
    </div>
</div>
@endif
@endsection

@section('script')
	<script src="{{ asset('js/tienda.js') }}"></script>
@endsection
	