
	<div class="form-group">
	<label class="control-label" for="nombre">{{'Nombre'}}</label>
	<input type="text" class="form-control {{ $errors-> has('nom_res')?'is-invalid':''	}}" name="nom_res" id="nom_res" value="{{ isset ($updateimage->nom_res)?$updateimage->nom_res:	old('nom_res') }}">
	{!! $errors->first('nom_res' , '<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label class="control-label" for="nombre">{{'Apellido'}}</label>
	<input type="text" class="form-control {{ $errors-> has('ape_res')?'is-invalid':''	}}" name="ape_res" id="ape_res" value="{{ isset ($updateimage->ape_res)?$updateimage->ape_res:	old('ape_res') }}">
	{!! $errors->first('ape_res' , '<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label class="col-sm-8 control-label">Documento</label>
	<select class="form-select {{ $errors-> has('tip_doc')?'is-invalid':''}}" name="tip_doc" id="tip_doc" value="{{ isset ($updateimage->tip_doc)?$updateimage->tip_doc:old('tip_doc') }}" aria-label="Default select example">
	<option selected>Seleccione Tipo Documento</option>
		@foreach (DB::table('tipo_documento')->select('tip_doc')->get() as $doc)
    <option value="{{ $doc->tip_doc }}">{{ $doc->tip_doc }}</option>
    	@endforeach
    </select>
    {!! $errors->first('tip_doc' , '<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label class="control-label" for="nombre">{{'Número Documento'}}</label>
	<input type="number" class="form-control {{ $errors-> has('num_res')?'is-invalid':''	}}" name="num_res" id="num_res" value="{{ isset ($updateimage->num_res)?$updateimage->num_res:	old('num_res') }}">
	{!! $errors->first('num_res' , '<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label class="control-label" for="nombre">{{'Teléfono'}}</label>
	<input type="number" class="form-control {{ $errors-> has('tel_res')?'is-invalid':''	}}" name="tel_res" id="tel_res" value="{{ isset ($updateimage->tel_res)?$updateimage->tel_res:	old('tel_res') }}">
	{!! $errors->first('tel_res' , '<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label class="control-label" for="nombre">{{'Correo'}}</label>
	<input type="email" class="form-control {{ $errors-> has('cor_res')?'is-invalid':''	}}" name="cor_res" id="cor_res" value="{{ isset ($updateimage->cor_res)?$updateimage->cor_res:	old('cor_res') }}">
	{!! $errors->first('cor_res' , '<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label class="col-sm-8 control-label">Rol</label>
	<select class="form-select {{ $errors-> has('nom_rol')?'is-invalid':''}}" name="nom_rol" id="nom_rol" value="{{ isset ($updateimage->nom_rol)?$updateimage->nom_rol:old('nom_rol') }}" aria-label="Default select example">
	<option selected>Seleccione Rol</option>
		@foreach (DB::table('tipo_rol')->select('nom_rol')->get() as $rol)
    <option value="{{ $rol->nom_rol }}">{{ $rol->nom_rol }}</option>
    	@endforeach
    </select>
    {!! $errors->first('nom_rol' , '<div class="invalid-feedback">:message</div>') !!}
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


	<input type="submit" class="btn btn-info" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">
	<a href="{{ url('usuarios') }}" class="btn btn-dark">Regresar</a>