	<div class="form-group">
	<label class="control-label" for="nombre">Raza</label>
	<input type="text" class="form-control {{ $errors-> has('nombre_raz')?'is-invalid':''	}}" name="nombre_raz" id="nombre" value="{{ isset ($admin->nombre_raz)?$admin->nombre_raz:	old('nombre_raz') }}">
	{!! $errors->first('nombre_raz' , '<div class="invalid-feedback">:message</div>') !!}
	</div>



	<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('raza/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>