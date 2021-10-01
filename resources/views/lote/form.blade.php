
<div class="form-group">
	<label class="control-label" for="area">Área</label>
	<input type="number" class="form-control {{ $errors-> has('area_lote')?'is-invalid':''	}}" name="area_lote" id="area" value="{{ isset ($admin->area_lote)?$admin->area_lote:	old('area_lote') }}">
	{!! $errors->first('area_lote' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label class="control-label" for="extension">Extensión</label>
	<input type="number" class="form-control {{ $errors-> has('extension_lote')?'is-invalid':''	}}" name="extension_lote" id="extension" value="{{ isset ($admin->extension_lote)?$admin->extension_lote:	old('extension_lote') }}">
	{!! $errors->first('extension_lote' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label class="control-label" for="nombre">Nombre</label>
	<input type="text" class="form-control {{ $errors-> has('nombre_lote')?'is-invalid':''	}}" name="nombre_lote" id="nombre" value="{{ isset ($admin->nombre_lote)?$admin->nombre_lote:	old('nombre_lote') }}">
	{!! $errors->first('nombre_lote' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label class="control-label" for="fcierre_lote">Fecha de Cierre</label>
	<input type="date" class="form-control {{ $errors-> has('fcierre_lote')?'is-invalid':''	}}" name="fcierre_lote" id="fcierre_lote" value="{{ isset ($admin->fcierre_lote)?$admin->fcierre_lote:	old('fcierre_lote') }}">
	{!! $errors->first('fcierre_lote' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label for="estado">Estado</label>
	<select class="form-control {{ $errors-> has('id_estadol')?'is-invalid':''}}" name="id_estadol" id="estado" value="{{ isset ($admin->id_estadol)?$admin->id_estadol:old('id_estadol') }}" aria-label="Default select example">
		<option value="" selected>Seleccione estado</option>
		@foreach ($estados as $estado)
		<option value="{{$estado->id_estadol}}" {{ old('id_estadol') == $estado->id_estadol ? 'selected' : '' }}>{{$estado->nombre_estadol}}</option>
		@endforeach
	</select>
	{!! $errors->first('id_estadol' , '<div class="invalid-feedback">:message</div>') !!}
</div>
<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('lote/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>