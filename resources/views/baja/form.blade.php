
<div class="form-group">
	<label for="bovino">Bovino</label>
	<select class="form-control {{ $errors-> has('id_bovino')?'is-invalid':''}}" name="id_bovino" id="bovino" aria-label="Default select example">
		<option selected>Seleccione Bovino</option>
		@foreach ($bovinos as $bovino)
		<option value="{{$bovino->id_bovino}}" {{ old('id_bovino') == $bovino->id_bovino ? 'selected' : '' }}>Bovino : {{$bovino->id_bovino}}, de raza : {{$bovino->raza->nombre_raz}}</option>
		@endforeach
	</select>
</div>

<div class="form-group">
	<label class="control-label" for="motivo">Motivo de Muerte</label>
	<input type="text" class="form-control {{ $errors-> has('motivo_baja')?'is-invalid':''	}}" name="motivo_baja" id="motivo" value="{{ isset ($admin->motivo_baja)?$admin->motivo_baja:	old('motivo_baja') }}">
	{!! $errors->first('motivo_baja' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label class="control-label" for="fechamuerte">Fecha de Muerte</label>
	<input type="date" class="form-control {{ $errors-> has('fecha_baja')?'is-invalid':''	}}" name="fecha_baja" id="fechamuerte" value="{{ isset ($admin->fecha_baja)?$admin->fecha_baja:	old('fecha_baja') }}">
	{!! $errors->first('fecha_baja' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('baja/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>