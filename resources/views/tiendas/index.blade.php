@extends('layouts.sinfooter')
@section('content')
@if(count($tiendas) > 0)
<div class="jumbotron jumbotron-red">
	<div class="container">
		@include('partials.message')
		@foreach($tiendas as $tienda)
		<div class="col-sm-9 col-xs-12">
		    <h2 class="text-capitalize">{{ $tienda->titulo }}</h2>
		    <p><small>{{ $tienda->sub_titulo }}</small></p>
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
			<a href="{{ url('/productos/create') }}" class="btn">
		    	<i class="fa fa-plus text-success" aria-hidden="true"></i> Agregar
		    </a>
		</h3>
		@foreach($productos as $producto)
			<div class="col-sm-12">
				<div class="row well" style="border: 1px solid #8133B7; margin: 12px;">
					<div class="">
						<h5 class="text-uppercase">
							<span>{{ $producto->titulo }}</span>
						</h5>
					</div>
					<div class="col-sm-2 text-right div-padding" style="border-right: 1px solid #8133B7;">
						
							@if($producto->extension)
								<img src="{{ url("/productos/images/$producto->id.$producto->extension") }}" 
								alt="imagen" class="img-responsive" width="50">
							@else
								<img src="{{ asset('img/sin_imagen.png') }}" width="50" alt="imagen" class="img-producto img-responsive">
							@endif
					</div>
					<div class="col-sm-10 text-left div-padding">
						<ul class="list-unstyled">
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
	                    </ul>
					<!-- <div class="caption text-peque margin-bottom-div">
						<p>
							<a href="{{ url('/productos/'.$producto->id) }}" class="btn btn-primary btn-block">Vista Detallada</a>
							<a href="{{ url('/productos/'.$producto->id.'/edit') }}" class="btn btn-warning btn-block">Editar</a>
							<a href="{{ url('/productos/'.$producto->id) }}" class="btn btn-danger btn-block">Eliminar</a>
						</p>
					</div> -->
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@else
<div class="jumbotron jumbotron-purple">
    <div class="container body_personal">
        <h1>Bienvenido! {{ Auth::user()->name }}</h1>
        <p>Tienda Comercial te permite crear una tienda virtual para que puedas vender tus articulos de forma segura y sin costo alguno. Empieza a crear tu tienda y publicar tus productos!</p>
        <p><a href="{{ url('/tiendas/create') }}" class="btn-morado btn-lg">Crear Tienda</a></p>
    </div>
</div>
@endif
@endsection
	