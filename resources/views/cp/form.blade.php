<form method="POST" class="form-inline">
	{{ csrf_field() }}
	<input type="hidden" name="producto_id" value="{{ $producto->id }}" id="input_producto_id">
	
	<button type="submit" class="btn-morado btn-lg btn-block" id="btn_agregar_pro" data-toggle="modal" data-target="#modal_msj">
		<i class="fa fa-shopping-cart"></i> Agregar
	</button> 
</form>