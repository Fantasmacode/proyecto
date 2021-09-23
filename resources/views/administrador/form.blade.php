<div class="form-group">
<label class="control-label" for="nombre">Nombre</label>
<input type="text" class="form-control {{ $errors-> has('nombres_usuario')?'is-invalid':''}}" name="nombres_usuario" id="nombre" value="{{ isset ($admin->nombres_usuario)?$admin->nombres_usuario:old('nombres_usuario') }}">
{!! $errors->first('nombres_usuario' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label class="control-label" for="apellidos">Apellidos</label>
<input type="text" class="form-control {{ $errors-> has('apellidos_usuario')?'is-invalid':''}}" name="apellidos_usuario" id="apellidos" value="{{ isset ($admin->apellidos_usuario)?$admin->apellidos_usuario:old('apellidos_usuario') }}">
{!! $errors->first('apellidos_usuario' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label for="exampleFormControlSelect1" for="tipo">Tipo de documento</label>
	<select class="form-control {{ $errors-> has('tipodoc_usuario')?'is-invalid':''}}" name="tipodoc_usuario" id="tipo" aria-label="Default select example">
		<option value="" selected>Seleccione un Tipo de Documento</option>
		<option value="CC" {{ old('tipodoc_usuario') == "CC" ? 'selected' : '' }}>CC</option>
		<option value="TI" {{ old('tipodoc_usuario') == "TI" ? 'selected' : '' }}>TI</option>
	</select>
	{!! $errors->first('tipodoc_usuario' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label class="control-label" for="documento">Documento</label>
<input type="number" class="form-control {{ $errors-> has('documento_usuario')?'is-invalid':''}}" name="documento_usuario" id="documento" value="{{ isset ($admin->documento_usuario)?$admin->documento_usuario:old('documento_usuario') }}">{!! $errors->first('documento_usuario' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label class="control-label" for="correo">Correo</label>
<input type="email" class="form-control {{ $errors-> has('correo_usuario')?'is-invalid':''}}" name="correo_usuario" id="correo" value="{{ isset ($admin->correo_usuario)?$admin->correo_usuario:old('correo_usuario') }}">
{!! $errors->first('correo_usuario' , '<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
	<label class="control-label" for="correo">Dirección</label>
	<input type="text" class="form-control {{ $errors-> has('direccion_usuario')?'is-invalid':''}}" name="direccion_usuario" id="correo" value="{{ isset ($admin->direccion_usuario)?$admin->direccion_usuario:old('direccion_usuario') }}">
		{!! $errors->first('direccion_usuario' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label class="control-label" for="telefono">Telefono</label>
	<input type="telefono" class="form-control {{ $errors-> has('telefono_usuario')?'is-invalid':''}}" name="telefono_usuario" id="telefono" value="{{ isset ($admin->telefono_usuario)?$admin->telefono_usuario:old('telefono_usuario') }}">
		{!! $errors->first('telefono_usuario' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label for="exampleFormControlSelect1" for="rol">Rol</label>
	<select class="form-control {{ $errors-> has('rol_usuario')?'is-invalid':''}}" name="rol_usuario" id="rol" aria-label="Default select example">
		<option value="" selected>Seleccione Rol</option>
		<option value="administrador" {{ old('rol_usuario') == "administrador" ? 'selected' : '' }}>Administrador</option>
		<option value="gerente" {{ old('rol_usuario') == "gerente" ? 'selected' : '' }}>Gerente</option>
		<option value="capataz" {{ old('rol_usuario') == "capataz" ? 'selected' : '' }}>Capataz</option>
	</select>
	{!! $errors->first('rol_usuario' , '<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
<label class="control-label" for="password">Contraseña</label>
<input type="password" class="form-control {{ $errors-> has('contrasena_usuario')?'is-invalid':''}}" name="contrasena_usuario" id="password" value="{{ isset ($admin->contrasena_usuario)?$admin->contrasena_usuario:old('contrasena_usuario') }}">
{!! $errors->first('contrasena_usuario' , '<div class="invalid-feedback">:message</div>') !!}
</div>


<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('administrador/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>