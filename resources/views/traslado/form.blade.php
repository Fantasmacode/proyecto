
<div class="form-group">
	<label for="bovino">Bovino</label>
	<select class="form-control {{ $errors-> has('id_bovino')?'is-invalid':''}}" name="id_bovino" id="bovino" aria-label="Default select example">
		<option value="" selected>Seleccione Bovino</option>
		@foreach ($bovinos as $bovino)
		<option value="{{$bovino->id_bovino}}" {{ old('id_bovino') == $bovino->id_bovino ? 'selected' : '' }}>Bovino : {{$bovino->id_bovino}}, de raza : {{$bovino->raza->nombre_raz}}</option>
		@endforeach
	</select>
	{!! $errors->first('id_bovino' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label for="motivo">Motivo de Traslado</label>
	<select class="form-control {{ $errors-> has('id_moti')?'is-invalid':''}}" name="id_moti" id="motivo" aria-label="Default select example">
		<option value="" selected>Seleccione motivo</option>
		@foreach ($motivos as $motivo)
		<option value="{{$motivo->id_moti}}" {{ old('id_moti') == $motivo->id_moti ? 'selected' : '' }}>{{$motivo->motivo_moti}}</option>
		@endforeach
	</select>
	{!! $errors->first('id_moti' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('traslado/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>