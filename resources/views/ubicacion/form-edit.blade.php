  <div class="form-group">
  <label class="control-label" for="nombre">{{'Latitud'}}</label>
  <input type="number" class="form-control {{ $errors-> has('latitud')?'is-invalid':''  }}" name="latitud" id="latitud" value="{{ isset ($admin->latitud)?$admin->latitud:  old('latitud') }}">
  {!! $errors->first('latitud' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <div class="form-group">
  <label class="control-label" for="nombre">{{'Longitud'}}</label>
  <input type="number" class="form-control {{ $errors-> has('longitud')?'is-invalid':'' }}" name="longitud" id="longitud" value="{{ isset ($admin->longitud)?$admin->longitud:  old('longitud') }}">
  {!! $errors->first('longitud' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('ubicacion/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>