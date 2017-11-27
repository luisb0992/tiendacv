<div class="modal" tabindex="-1" role="dialog" id="realizar_preguntas">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron-green div-padding">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<h3 class="modal-title">
					Pregunta para el vendedor
				</h3>
			</div> 
			<div class="modal-body">
				<!-- mensaje ajax en fail -->
				<div class="alert alert-danger" id="modal-fail-pre" style="display: none;">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <ul id="modal_fail_fail_pre" class="list-unstyled"> </ul>
				</div>

				<!-- campos obligatorios -->
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<input type="hidden" name="producto_id" id="producto_id" value="{{ $producto->id }}">
				<textarea name="pregunta" id="pregunta" cols="30" rows="10" class="form-control" placeholder="Escribe aqui tu pregunta..."></textarea>

			</div>
			<div class="modal-footer">
				<span class="pull-left"><i class="icon_fa"></i> </span>
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
				<buttton class="btn btn-success" type="button" id="btn_preguntar"> Preguntar</buttton>
			</div>
		</div>
	</div>
</div>