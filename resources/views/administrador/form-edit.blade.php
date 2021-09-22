<div class="form-group">
<label class="control-label" for="nombre">{{'Nombre'}}</label>
<input type="text" class="form-control {{ $errors-> has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{ isset ($admin->nombre)?$admin->nombre:old('nombre') }}">
{!! $errors->first('nombre' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label class="control-label" for="nombre">{{'Documento'}}</label>
<input type="number" class="form-control {{ $errors-> has('documento')?'is-invalid':''}}" name="documento" id="documento" value="{{ isset ($admin->documento)?$admin->documento:old('documento') }}">{!! $errors->first('documento' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label class="control-label" for="nombre">{{'Correo'}}</label>
<input type="email" class="form-control {{ $errors-> has('email')?'is-invalid':''}}" name="email" id="email" value="{{ isset ($admin->email)?$admin->email:old('email') }}">
{!! $errors->first('email' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label class="control-label" for="nombre">{{'Telefono'}}</label>
<input type="telefono" class="form-control {{ $errors-> has('telefono')?'is-invalid':''}}" name="telefono" id="telefono" value="{{ isset ($admin->telefono)?$admin->telefono:old('telefono') }}">
{!! $errors->first('telefono' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<form>
  <div class="form-group">
    <label for="exampleFormControlSelect1" for="rol">{{'Rol'}}</label>
    <select class="form-control {{ $errors-> has('rol')?'is-invalid':''}}" name="rol" id="rol" 
    value="{{ isset ($admin->rol)?$admin->rol:old('rol') }}" aria-label="Default select example">
      <option selected>Seleccione Rol</option>
    <option value="administrador">Administrador</option>
    <option value="gerente">Gerente</option>
    <option value="capataz">Capataz</option>
    </select>
    {!! $errors->first('rol' , '<div class="invalid-feedback">:message</div>') !!}
  </div>



<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('administrador/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>