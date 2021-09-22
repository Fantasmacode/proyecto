<form>
	<div class="form-group">
	<label for="exampleFormControlSelect1"for="bovino">{{'Bovino'}}</label>
	<select class="form-control {{ $errors-> has('bovino')?'is-invalid':''}}" name="bovino" id="bovino" value="{{ isset ($admin->bovino)?$admin->bovino:old('bovino') }}" aria-label="Default select example">
		
	<option selected>Seleccione Bovino</option>
	@foreach (DB::table('bovinos')->Get() as $bovino)
	<option value="{{$bovino->idbovino}}">{{$bovino->idbovino}}</option>
     @endforeach
    </select>
    <br>

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

<a class="btn btn-secondary" href="{{ url('traslado/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>