<form action="{{ url('/productos') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="titulo">Titulo</label>
		<input type="text" name="titulo" class="form-control text-uppercase" id="titulo" required autofocus autocomplete>
	</div>
	<div class="form-group">
		<label for="categoria">Categoria</label>
		<select name="categoria_id" id="categoria" class="form-control" required>
			<option value="">Seleccione una categoria</option>
			@foreach($categorias as $categoria)
			<option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="descripcion">Descripcion</label>
		<textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control text-uppercase"></textarea>
	</div>
	<div class="form-group">
		<label for="precio_bolivar">Precio Bolivar (BsF)</label>
		<input type="number" name="precio_bolivar" class="form-control" id="precio_bolivar" required autocomplete>
	</div>
	<div class="form-group">
		<label for="precio_dolar">Precio Dolar (USD)</label>
		<input type="number" name="precio_dolar" class="form-control" id="precio_dolar" required autocomplete>
	</div>
	<div class="form-group">
		<label for="extension">Seleccione una imagen</label>
		<input type="file" name="imagen" class="btn btn-link" id="extension" autocomplete>
	</div>
	<div class="form-group text-right">
		<input type="submit" value="Registro" class="btn-morado btn-lg">
	</div>
</form>