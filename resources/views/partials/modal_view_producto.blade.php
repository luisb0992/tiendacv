<div class="modal" tabindex="-1" role="dialog" id="mymodal_view_producto">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron-purple div-padding">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<h1 class="modal-title text-uppercase">{{ $producto->titulo }}</h1>
			</div> 
			<div class="modal-body">
				<p>Categoria: {{ $producto->nameCategoria() }}</p>
				<p>Descripcion: {{ $producto->descripcion }}</p>
				<p>Precio en Bolivares: {{ $producto->precio_bolivar }} BsF</p>
				<p>Precio en Dolares: {{ $producto->precio_dolar }} USD</p>
				<p>Fecha de creacion: {{ $producto->forcreated() }}</p>
				<p>Ultima Actualizacion: {{ $producto->forupdated() }}</p>
			</div>
			<div class="modal-footer">
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
			</div>
		</div>
	</div>
</div>