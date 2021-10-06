<!--
<div class="form-group">
	<label for="comercio">Comercio</label>
	<select class="form-control {{ $errors-> has('id_comercio')?'is-invalid':''}}" name="id_comercio" id="comercio" value="{{ isset ($admin->id_comercio)?$admin->id_comercio:old('id_comercio') }}" aria-label="Default select example">
		<option value="" selected>Seleccione comercio</option>
		@foreach ($comercios as $comercio)
		<option value="{{$comercio->id_comercio}}" {{ old('id_comercio') == $comercio->id_comercio ? 'selected' : '' }}>{{$comercio->tipo_comercio}}</option>
		@endforeach
	</select>

	{!! $errors->first('id_comercio' , '<div class="invalid-feedback">:message</div>') !!}
</div>
-->

<div class="form-group">
	<label for="raza">Raza</label>
	<select class="form-control {{ $errors-> has('id_raz')?'is-invalid':''}}" name="id_raz" id="raza" value="{{ isset ($admin->id_raz)?$admin->id_raz:old('id_raz') }}" aria-label="Default select example">
		<option value="" selected>Seleccione raza</option>
		@foreach ($razas as $raza)
		<option value="{{$raza->id_raz}}" {{ old('id_raz') == $raza->id_raz ? 'selected' : '' }}>{{$raza->nombre_raz}}</option>
		@endforeach
	</select>

	{!! $errors->first('id_raz' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label class="control-label" for="peso">Peso</label>
	<input type="number" step="any" class="form-control {{ $errors-> has('peso_bovino')?'is-invalid':''	}}" name="peso_bovino" id="peso" value="{{ isset ($admin->peso_bovino)?$admin->peso_bovino:	old('peso_bovino') }}">
	{!! $errors->first('peso_bovino' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label class="control-label" for="edad">Edad</label>
	<input type="number" class="form-control {{ $errors-> has('edad_bovino')?'is-invalid':''	}}" name="edad_bovino" id="edad" value="{{ isset ($admin->edad_bovino)?$admin->edad_bovino:	old('edad_bovino') }}">
	{!! $errors->first('edad_bovino' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label for="finalidad">Finalidad</label>
	<select class="form-control {{ $errors-> has('finalidad_bovino')?'is-invalid':''}}" name="finalidad_bovino" id="finalidad" aria-label="Default select example">
		<option value="" selected>Seleccione Finalidad</option>
		<option value="Carne" {{ old('finalidad_bovino') == "Carne" ? 'selected' : '' }}>Carne</option>
		<option value="Leche" {{ old('finalidad_bovino') == "Leche" ? 'selected' : '' }}>Leche</option>
		<option value="Doble Propósito" {{ old('finalidad_bovino') == "Doble Propósito" ? 'selected' : '' }}>Doble Propósito</option>
	</select>
	{!! $errors->first('finalidad_bovino' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label for="estado">Estado</label>
	<select class="form-control {{ $errors-> has('id_estadob')?'is-invalid':''}}" name="id_estadob" id="estado" aria-label="Default select example">
		<option value="" selected>Seleccione estado</option>
		@foreach ($estados as $estado)
		<option value="{{$estado->id_estadob}}" {{ old('id_estadob') == $estado->id_estadob ? 'selected' : '' }}>{{$estado->nombre_estadob}}</option>
		@endforeach
	</select>
	{!! $errors->first('id_estadob' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label for="lote">Lote</label>
	<select class="form-control {{ $errors-> has('id_lote')?'is-invalid':''}}" name="id_lote" id="lote" value="{{ isset ($admin->id_lote)?$admin->id_lote:old('id_lote') }}" aria-label="Default select example">
		<option value="" selected>Seleccione lote</option>
		@foreach ($lotes as $lote)
		<option value="{{$lote->id_lote}}" {{ old('id_lote') == $lote->id_lote ? 'selected' : '' }}>{{$lote->nombre_lote}}</option>
		@endforeach
	</select>

	{!! $errors->first('id_lote' , '<div class="invalid-feedback">:message</div>') !!}
</div>

















<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('bovino/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>

