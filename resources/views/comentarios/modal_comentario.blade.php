<div class="modal" tabindex="-1" role="dialog" id="comentario">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron-purple div-padding">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<h1 class="modal-title text-uppercase"></h1>
			</div> 
			<div class="modal-body">
				<!-- mensaje ajax en fail -->
				<div class="alert alert-danger" id="modal-fail" style="display: none;">
				    <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <p id="modal_fail_fail"><i class="fa fa-remove"></i> </p>
				</div>

				<!-- campos obligatorios -->
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<input type="hidden" name="producto_id" id="producto_id" value="{{ $producto->id }}">
				<textarea name="comentario" id="coment" cols="30" rows="10" class="form-control" placeholder="Algo que quieras decir...."></textarea>

				<!-- calificaciones -->
				<hr class="hr">
				<div class="row">
					<div class="col-sm-12">
						<p>
							<strong>Como calificarias este producto?</strong><br>
						</p>
						<p>
						<select id="" name="puntaje" class="puntaje star-rating">
							<option value="">Seleciona una calificacion</option>
							<option value="5">Excelente</option>
							<option value="4">Muy bueno</option>
							<option value="3">Bueno</option>
							<option value="2">Medio</option>
							<option value="1">Terrible</option>
						</select>
						</p>
					</div>	
				</div>	
			</div>
			<div class="modal-footer">
				<span class="pull-left"><i class="icon_fa"></i> </span>
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
				<buttton class="btn btn-primary" type="button" id="btn_coment"> Enviar</buttton>
			</div>
		</div>
	</div>
</div>