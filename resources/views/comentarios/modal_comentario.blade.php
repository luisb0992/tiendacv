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
						<span class="col-sm-2"><small>Puntuacion</small></span>
						<label class="col-sm-2">
							<i class="fa fa-star-o"></i>1 <input type="radio" name="calif" class="calif" value="1">
						</label>
						<label class="col-sm-2">
							<i class="fa fa-star-o"></i>2 <input type="radio" name="calif" class="calif" value="2">
						</label>
						<label class="col-sm-2">
							<i class="fa fa-star-o"></i>3 <input type="radio" name="calif" class="calif" value="3">
						</label>
						<label class="col-sm-2">
							<i class="fa fa-star-o"></i>4 <input type="radio" name="calif" class="calif" value="4">
						</label>
						<label class="col-sm-2">
							<i class="fa fa-star-o"></i>5 <input type="radio" name="calif" class="calif" value="5">
						</label>
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