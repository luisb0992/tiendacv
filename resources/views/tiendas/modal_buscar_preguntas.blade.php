<div class="modal fade" tabindex="-1" role="dialog" id="buscar_preguntas">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="margin-bottom: -3em;">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<span id="msj_res" style="display: none;">
					<div class='alert alert-success' style='position: fixed center;'>
					    <button type='button' class='close' data-dismiss='alert'>&times;</button>
					    <p><i class='fa fa-check'></i> Respondida</p>
					</div>
				<span>
				<span id="reload" style="display: none;"><i class="fa fa-spinner fa-pulse fa-2x fa-fw text-danger"></i></span>
			</div>
			<div class="modal-body" id="res_pregunta">
			</div>
			<div class="modal-footer">
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
			</div>
		</div>
	</div>
</div>