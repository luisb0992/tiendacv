<div class="modal" tabindex="-1" role="dialog" id="comentario">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header jumbotron-blue div-padding">
				<buttton class="close" type="button" data-dismiss="modal">&times;</buttton>
				<h3 class="modal-title">
					Comenta que te parecio este producto
				</h3>
			</div> 
			<div class="modal-body">
				<!-- mensaje ajax en fail -->
				<h5>
					<div class="alert alert-danger" id="modal-fail" style="display: none;">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <ul id="modal_fail_fail" class="list-unstyled"> </ul>
					</div>
				</h5>

				<!-- campos obligatorios -->
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<input type="hidden" name="producto_id" id="producto_id" value="{{ $producto->id }}">
				<textarea name="comentario" id="coment" cols="30" rows="10" class="form-control" placeholder="Algo que quieras decir...."></textarea>

				<!-- calificaciones -->
				<div class="row">
					<div class="col-sm-12">
						<h3>
							<strong>Como calificarias este producto?</strong><br>
						</h3>
						<h4>
							<select name="puntaje" class="puntaje star-rating">
								<option value="">Seleciona una calificacion</option>
								<option value="5">Excelente</option>
								<option value="4">Muy bueno</option>
								<option value="3">Bueno</option>
								<option value="2">Medio</option>
								<option value="1">Terrible</option>
							</select>
						</43>
					</div>	
				</div>	
			</div>
			<div class="modal-footer">
				<span class="pull-left"><i class="icon_fa"></i> </span>
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
				<buttton class="btn btn-info" type="button" id="btn_coment"> Enviar</buttton>
			</div>
		</div>
	</div>
</div>