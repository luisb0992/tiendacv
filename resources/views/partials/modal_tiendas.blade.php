<div class="modal fade" tabindex="-1" role="dialog" id="mymodal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron-purple div-padding">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<h1 class="modal-title text-uppercase">{{ $tienda->titulo }}</h1>
				<p><small>{{ $tienda->sub_titulo }}</small></p>
			</div> 
			<div class="modal-body">
				<p>RIF: {{ $tienda->RIF }}</p>
				<p>Correo: {{ $tienda->correo }}</p>
				<p>Telefono Nº1: {{ $tienda->telefono_1 }}</p>
				<p>Telefono Nº2: {{ $tienda->telefono_2 }}</p>
				<p>Fecha de creacion: {{ $tienda->forcreated() }}</p>
				<p>Ultima Actualizacion: {{ $tienda->forupdated() }}</p>
			</div>
			<div class="modal-footer">
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
			</div>
		</div>
	</div>
</div>