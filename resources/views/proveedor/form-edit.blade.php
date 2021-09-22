

  <div class="form-group">
  <label class="control-label" for="nombre">{{'Nombre'}}</label>
  <input type="text" class="form-control {{ $errors-> has('nombre')?'is-invalid':'' }}" name="nombre" id="nombre" value="{{ isset ($admin->nombre)?$admin->nombre:  old('nombre') }}">
  {!! $errors->first('nombre' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <div class="form-group">
  <label class="control-label" for="nombre">{{'Dirección'}}</label>
  <input type="text" class="form-control {{ $errors-> has('direccion')?'is-invalid':''  }}" name="direccion" id="direccion" value="{{ isset ($admin->direccion)?$admin->direccion:  old('direccion') }}">
  {!! $errors->first('direccion' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <div class="form-group">
  <label class="control-label" for="nombre">{{'Teléfono'}}</label>
  <input type="number" class="form-control {{ $errors-> has('telefono')?'is-invalid':'' }}" name="telefono" id="telefono" value="{{ isset ($admin->telefono)?$admin->telefono:  old('telefono') }}">
  {!! $errors->first('telefono' , '<div class="invalid-feedback">:message</div>') !!}
  </div>


  <div class="form-group">
  <label class="control-label" for="nombre">{{'Correo'}}</label>
  <input type="email" class="form-control {{ $errors-> has('correo')?'is-invalid':''}}" name="correo" id="correo" value="{{ isset ($admin->correo)?$admin->correo:old('correo') }}">
  {!! $errors->first('correo' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  

  

  



  <!--<div class="form-group">
  <label class="control-label" for="nombre">{{'Contraseña'}}</label>
  <input type="text" class="form-control {{ $errors-> has('nom_res')?'is-invalid':''  }}" name="nom_res" id="nom_res" value="{{ isset ($updateimage->nom_res)?$updateimage->nom_res:  old('nom_res') }}">
  {!! $errors->first('nom_res' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <div class="form-group">
  <label class="control-label" for="nombre">{{'Confirmar contraseña'}}</label>
  <input type="text" class="form-control {{ $errors-> has('nom_res')?'is-invalid':''  }}" name="nom_res" id="nom_res" value="{{ isset ($updateimage->nom_res)?$updateimage->nom_res:  old('nom_res') }}">
  {!! $errors->first('nom_res' , '<div class="invalid-feedback">:message</div>') !!}
  </div>-->


  <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('proveedor/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>