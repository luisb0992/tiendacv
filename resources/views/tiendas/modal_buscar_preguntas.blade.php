<form action="{{ url('preguntas/') }}" class="form-horizontal" method="POST">
{{ method_field('PUT') }}
{{ csrf_field() }}
<div class="modal fade" tabindex="-1" role="dialog" id="buscar_preguntas">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<table class="table table-striped table-responsive">
					<thead>
						<tr>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody id="res_pregunta">
						
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<buttton class="btn btn-danger" data-dismiss="modal" type="button">Cerrar</buttton>
			</div>
		</div>
	</div>
</div>
</form>