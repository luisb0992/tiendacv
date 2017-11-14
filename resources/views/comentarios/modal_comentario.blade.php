<div class="modal" tabindex="-1" role="dialog" id="comentario">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron-purple div-padding">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<h1 class="modal-title text-uppercase"></h1>
			</div> 
			<div class="modal-body">
				<div class="alert alert-danger" id="modal-fail" style="display: none;">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <p id="modal_fail_fail"><i class="fa fa-remove"></i> </p>
				</div>
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<input type="hidden" name="producto_id" id="producto_id" value="{{ $producto->id }}">
				<textarea name="comentario" id="coment" cols="30" rows="10" class="form-control" placeholder="Algo que quieras decir...."></textarea>
			</div>
			<div class="modal-footer">
				<span class="pull-left"><i class="icon_fa"></i> </span>
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
				<buttton class="btn btn-primary" type="button" id="btn_coment"> Enviar</buttton>
			</div>
		</div>
	</div>
</div>