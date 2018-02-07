@extends('layouts.sinfooter')
@section('content')
	<div class="container white">
	<hr>
	@if($productos->count() > 0)
		<h4 class="text-capitalize text-left">
			<i><span class="text-morado">Mostrado resultados para</span> <small>{{ $palabra }}</small></i> 
		</h4>
			<div class="row">
				@foreach($productos as $producto)
		            <div class="col-sm-3 col-xs-12 box-data-1">
		                    <div class="row well well-sm" style="margin: 1px;">
		                        <div class="col-sm-12 div-padding" align="center">
		                            <a href="{{ url('/productos/'.$producto->id) }}" data-toggle="tooltip" data-placement="top" title="{{ $producto->titulo }}">
		                                <img style="height: 200px;"

		                                    @if($producto->extension)
		                                        src="{{ url("/productos/images/$producto->id.$producto->extension") }}"
		                                    @else
		                                        src="{{ asset('img/sin_imagen.png') }}"
		                                    @endif
		                                
		                                alt="imagen" class="img-responsive">
		                            </a>
		                        </div>
		                        <div class="col-sm-12" style="font-size: 10px;">
		                            @if($producto->user->id == Auth::user()->id)
		                                <i class="fa fa-user text-success"></i>
		                            @endif
		                            <a href="{{ url('/productos/'.$producto->id) }}" class="text-morado">
		                                {{ $producto->titulo }}
		                            </a>
		                        </div>
		                        <div class="col-sm-12 div-padding">
		                            <!-- <p>
		                                <span class="h4 text-danger">Bsf: 
		                                {{ $producto->precio_bolivar }} </span>
		                            </p> -->
		                            <p>
		                                <span class="h4 text-primary">USD: 
		                                {{ $producto->precio_dolar }} </span>
		                            </p>
		                        </div>
		                    </div>
		                    <br>
		            </div>
		        @endforeach
		        <div class="pagination">
		        	<span>{{$productos->links()}}</span>
		        </div>
			</div>
	@else
		<div class="col-sm-12">
			<div class='alert alert-info' style='position: fixed center;'>
			    <button type='button' class='close' data-dismiss='alert'>&times;</button>
			    <p>
			    	<i class="fa fa-trash"></i> 0 resultados para <i><small>{{ $palabra }}</small></i>
			    	<b> | <a href="{{ url('/home') }}" class="btn-link"><span class="text-morado">Volver al dashboard</span></a></b>
			    </p>
			</div>
		</div>
	@endif	
	</div>
@endsection
