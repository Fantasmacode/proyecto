
	<div class="form-group">
	<label class="control-label" for="nombre">Nombre</label>
	<input type="text" class="form-control {{ $errors-> has('nombre_proveedores')?'is-invalid':''	}}" name="nombre_proveedores" id="nombre" value="{{ isset ($admin->nombre_proveedores)?$admin->nombre_proveedores:	old('nombre_proveedores') }}">
	{!! $errors->first('nombre_proveedores' , '<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label class="control-label" for="nombre">Dirección</label>
	<input type="text" class="form-control {{ $errors-> has('direccion_proveedores')?'is-invalid':''	}}" name="direccion_proveedores" id="direccion" value="{{ isset ($admin->direccion_proveedores)?$admin->direccion_proveedores:	old('direccion_proveedores') }}">
	{!! $errors->first('direccion_proveedores' , '<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label class="control-label" for="nombre">Teléfono</label>
	<input type="number" class="form-control {{ $errors-> has('telefono_proveedores')?'is-invalid':''	}}" name="telefono_proveedores" id="telefono" value="{{ isset ($admin->telefono_proveedores)?$admin->telefono_proveedores:	old('telefono_proveedores') }}">
	{!! $errors->first('telefono_proveedores' , '<div class="invalid-feedback">:message</div>') !!}
	</div>


	<div class="form-group">
	<label class="control-label" for="nombre">Correo</label>
	<input type="email" class="form-control {{ $errors-> has('correo_proveedores')?'is-invalid':''}}" name="correo_proveedores" id="correo" value="{{ isset ($admin->correo_proveedores)?$admin->correo_proveedores:old('correo_proveedores') }}">
	{!! $errors->first('correo_proveedores' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('proveedor/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>