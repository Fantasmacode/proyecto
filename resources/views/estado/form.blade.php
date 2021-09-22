	<form>
	<div class="form-group">
	<label for="exampleFormControlSelect1"for="raza">{{'Raza'}}</label>
	<select class="form-control {{ $errors-> has('raza')?'is-invalid':''}}" name="raza" id="raza" value="{{ isset ($admin->raza)?$admin->raza:old('raza') }}" aria-label="Default select example">
		
	<option selected>Seleccione raza</option>
	@foreach (DB::table('razas')->Get() as $raza)
	<option value="{{$raza->idraza}}">{{$raza->nombreraza}}</option>
     @endforeach
    </select>
    
    {!! $errors->first('raza' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('estado/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>