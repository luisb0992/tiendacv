<form action="{{ url('/tiendas/'.$tienda->id) }}" class="form-horizontal" method="POST">
{{ method_field('PUT') }}
{{ csrf_field() }}
<div class="modal fade" tabindex="-1" role="dialog" id="modal_edit">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron-orange div-padding">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<h3 class="modal-title text-uppercase">{{ $tienda->titulo }}</h3>
				<p><small>{{ $tienda->sub_titulo }}</small></p>
			</div> 
			<div class="modal-body">
				<p>Titulo: <input type="text" name="titulo" value="{{ $tienda->titulo }}" class="form-control"></p>
				<p>Sub-titulo: <input type="text" name="sub_titulo" value="{{ $tienda->sub_titulo }}" class="form-control"></p>
				<p>RIF: <input type="text" name="RIF" value="{{ $tienda->RIF }}" class="form-control"></p>
				<p>Correo: <input type="text" name="correo" value="{{ $tienda->correo }}" class="form-control"></p>
				<p>Telefono Nº1: <input type="text" name="telefono_1" value="{{ $tienda->telefono_1 }}" class="form-control"></p>
				<p>Telefono Nº2: <input type="text" name="telefono_2" value="{{ $tienda->telefono_2 }}" class="form-control"></p>
			</div>
			<div class="modal-footer">
				<input class="btn btn-warning" type="submit" value="Realizar Cambios">	
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
			</div>
		</div>
	</div>
</div>
</form>