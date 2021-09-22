	<div class="form-group">
	<label class="control-label" for="nombre">{{'Raza'}}</label>
	<input type="text" class="form-control {{ $errors-> has('nombreraza')?'is-invalid':''	}}" name="nombreraza" id="nombreraza" value="{{ isset ($admin->nombreraza)?$admin->nombreraza:	old('nombreraza') }}">
	{!! $errors->first('nombreraza' , '<div class="invalid-feedback">:message</div>') !!}
	</div>



	<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('raza/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>