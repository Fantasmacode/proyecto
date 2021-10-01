
<div class="form-group">
	<label for="tipo_comercio">Comercio</label>
	<select class="form-control {{ $errors-> has('tipo_comercio')?'is-invalid':''}}" name="tipo_comercio" id="tipo_comercio" aria-label="Default select example">
		<option value="" selected>Seleccione Tipo de Comercio</option>
		<option value="Venta">Venta</option>
		<option value="Compra">Compra</option>
	</select>
	{!! $errors->first('tipo_comercio' , '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
	<label for="proveedor">Proveedor</label>
	<select class="form-control {{ $errors-> has('id_proveedores')?'is-invalid':''}}" name="id_proveedores" id="proveedor" value="{{ isset ($admin->id_proveedores)?$admin->id_proveedores:old('id_proveedores') }}" aria-label="Default select example">
		<option value="" selected>Seleccione proveedor</option>
		@foreach ($proveedores as $proveedor)
		<option value="{{$proveedor->id_proveedores}}">{{$proveedor->nombre_proveedores}}</option>
		@endforeach
	</select>

	{!! $errors->first('id_proveedores' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('comercio/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>


