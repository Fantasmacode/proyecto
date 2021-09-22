	<div class="form-group">
	<label class="control-label" for="nombre">{{'Motivo de Traslado'}}</label>
	<input type="text" class="form-control {{ $errors-> has('motivo')?'is-invalid':''	}}" name="motivo" id="motivo" value="{{ isset ($admin->motivo)?$admin->motivo:	old('motivo') }}">
	{!! $errors->first('motivo' , '<div class="invalid-feedback">:message</div>') !!}
	</div>



	



	<!--<div class="form-group">
	<label class="control-label" for="nombre">{{'Contraseña'}}</label>
	<input type="text" class="form-control {{ $errors-> has('nom_res')?'is-invalid':''	}}" name="nom_res" id="nom_res" value="{{ isset ($updateimage->nom_res)?$updateimage->nom_res:	old('nom_res') }}">
	{!! $errors->first('nom_res' , '<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label class="control-label" for="nombre">{{'Confirmar contraseña'}}</label>
	<input type="text" class="form-control {{ $errors-> has('nom_res')?'is-invalid':''	}}" name="nom_res" id="nom_res" value="{{ isset ($updateimage->nom_res)?$updateimage->nom_res:	old('nom_res') }}">
	{!! $errors->first('nom_res' , '<div class="invalid-feedback">:message</div>') !!}
	</div>-->


	<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('motivotraslado/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>