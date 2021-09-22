<form>
  <div class="form-group">
  <label for="exampleFormControlSelect1"for="estado">{{'Estado del Bovino'}}</label>
  <select class="form-control {{ $errors-> has('nombre')?'is-invalid':''}}" name="nombre" id="nombre" value="{{ isset ($admin->nombre)?$admin->nombre:old('nombre') }}" aria-label="Default select example">
  <option selected>Seleccione Estado</option>
  <option value="Activo">Activo</option>
    <option value="Inactivo">Inactivo</option>
        </select>
    {!! $errors->first('nombre' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('estado/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>