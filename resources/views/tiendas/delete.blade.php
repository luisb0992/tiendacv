<form action="{{ url('/tiendas/'.$tienda->id) }}" method="POST">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}
	<div class="form-group text-right">
		<button type="submit" value="" class="btn btn-danger btn-lg btn-block" 
		onclick="return confirm('Seguro desea eliminar S/N?')">
			<i class="fa fa-trash" aria-hidden="true"></i>
			Eliminar
		</button>
	</div>
</form>