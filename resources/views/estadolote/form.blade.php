
	<form>
	<div class="form-group">
	<label for="exampleFormControlSelect1"for="estado">{{'Estado de Lote'}}</label>
	<select class="form-control {{ $errors-> has('estado')?'is-invalid':''}}" name="estado" id="estado" value="{{ isset ($admin->estado)?$admin->estado:old('estado') }}" aria-label="Default select example">
	<option selected>Seleccione Estado</option>
	<option value="Abierto">Abierto</option>
    <option value="Cerrado">Cerrado</option>
   	<option value="Pendiente">Pendiente</option>

		    </select>
    {!! $errors->first('estado' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('estadolote/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>