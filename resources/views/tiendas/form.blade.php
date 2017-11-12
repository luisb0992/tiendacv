<form action="{{ url('/tiendas') }}" class="form-horizontal" method="POST">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="titulo">Titulo</label>
		<input type="text" name="titulo" class="form-control text-uppercase" id="titulo" required autofocus autocomplete>
	</div>
	<div class="form-group">
		<label for="sub_titulo">SubTitulo o Eslogan (Opcional)</label>
		<input type="text" name="sub_titulo" class="form-control text-uppercase" id="sub_titulo" autocomplete>
	</div>
	<div class="form-group">
		<label for="RIF">RIF</label>
		<input type="text" name="RIF" class="form-control text-uppercase" id="RIF" required autocomplete>
	</div>
	<div class="form-group">
		<label for="correo">E-mail</label>
		<input type="email" name="correo" class="form-control text-uppercase" id="correo" required autocomplete>
	</div>
	<div class="form-group">
		<label for="telefono_1">Nº Telefonico 1</label>
		<input type="text" name="telefono_1" class="form-control text-uppercase" id="telefono_1" required autocomplete>
	</div>
	<div class="form-group">
		<label for="telefono_2">Nº Telefonico 2 (Opcional)</label>
		<input type="text" name="telefono_2" class="form-control text-uppercase" id="telefono_2" autocomplete>
	</div>
	<div class="form-group text-right">
		<input type="submit" value="Registro" class="btn-morado btn-lg">
	</div>
</form>