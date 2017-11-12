<form action="{{ url('/cp') }}" method="POST" class="form-inline">
	{{ csrf_field() }}
	<input type="hidden" name="producto_id" value="{{ $producto->id }}">
	
	<button type="submit" class="btn-morado btn-lg btn-block">
		<i class="fa fa-shopping-cart"></i> Agregar
	</button> 
</form>