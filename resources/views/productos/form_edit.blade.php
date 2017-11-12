<form action="{{ url('/productos/'.$productos->id) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<div class="form-group">
		<label for="titulo">Titulo</label>
		<input type="text" name="titulo" class="form-control text-uppercase" id="titulo" value="{{ $productos->titulo }}" required autofocus autocomplete>
	</div>
	<div class="form-group">
		<label for="categoria">Categoria</label>
		<select name="categoria_id" id="categoria" class="form-control" required>
			<option value="{{ $productos->categoria_id }}">{{ $productos->nameCategoria() }}</option>
			<option value="">Seleccione una categoria</option>
			@foreach($categorias as $categoria)
			<option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="descripcion">Descripcion</label>
		<textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control text-uppercase">{{ $productos->titulo }}</textarea>
	</div>
	<div class="form-group">
		<label for="precio_bolivar">Precio Bolivar (BsF)</label>
		<input type="number" name="precio_bolivar" class="form-control" id="precio_bolivar" value="{{ $productos->precio_bolivar }}" required autocomplete>
	</div>
	<div class="form-group">
		<label for="precio_dolar">Precio Dolar (USD)</label>
		<input type="number" name="precio_dolar" class="form-control" id="precio_dolar" value="{{ $productos->precio_dolar }}"  required autocomplete>
	</div>
	<div class="form-group">
		<label for="extension">Seleccione una imagen</label>
		<input type="file" name="imagen" class="btn btn-link" id="extension" value="{{ $productos->imagen }}"  autocomplete>
	</div>
	<div class="form-group text-right">
		<input type="submit" value="Actualizar Producto" class="btn-morado btn-lg">
	</div>
</form>