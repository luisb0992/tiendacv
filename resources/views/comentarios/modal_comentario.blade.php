<div class="modal fade" tabindex="-1" role="dialog" id="comentario">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron-purple div-padding">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<h1 class="modal-title text-uppercase"></h1>
			</div> 
			<div class="modal-body">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<input type="hidden" name="producto_id" id="producto_id" value="{{ $producto->id }}">
				<textarea name="comentario" id="coment" cols="30" rows="10" class="form-control" placeholder="Algo que quieras decir...."></textarea>
			</div>
			<div class="modal-footer">
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
				<buttton class="btn btn-primary" type="button" id="btn_coment"><i id="icon_fa" class=""></i> Enviar</buttton>
			</div>
		</div>
	</div>
</div>