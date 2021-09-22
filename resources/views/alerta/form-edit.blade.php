  <div class="form-group">
  <label class="control-label" for="nombre">{{'Mensaje de Alerta'}}</label>
  <input type="text" class="form-control {{ $errors-> has('mensajealerta')?'is-invalid':''  }}" name="mensajealerta" id="mensajealerta" value="{{ isset ($admin->mensajealerta)?$admin->mensajealerta:  old('mensajealerta') }}">
  {!! $errors->first('mensajealerta' , '<div class="invalid-feedback">:message</div>') !!}
  </div>


  <div class="form-group">
  <label class="control-label" for="nombre">{{'Fecha'}}</label>
  <input type="date" class="form-control {{ $errors-> has('fecha')?'is-invalid':''  }}" name="fecha" id="fecha" value="{{ isset ($admin->fecha)?$admin->fecha:  old('fecha') }}">
  {!! $errors->first('fecha' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <div class="form-group">
  <label class="control-label" for="nombre">{{'Hora'}}</label>
  <input type="text" class="form-control {{ $errors-> has('hora')?'is-invalid':'' }}" name="hora" id="hora" value="{{ isset ($admin->hora)?$admin->hora:  old('hora') }}">
  {!! $errors->first('hora' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('alerta/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>