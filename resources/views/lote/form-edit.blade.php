  <div class="form-group">
  <label class="control-label" for="nombre">{{'Lote'}}</label>
  <input type="text" class="form-control {{ $errors-> has('nombrelote')?'is-invalid':'' }}" name="nombrelote" id="nombrelote" value="{{ isset ($admin->nombrelote)?$admin->nombrelote:  old('nombrelote') }}">
  {!! $errors->first('nombrelote' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <div class="form-group">
  <label class="control-label" for="nombre">{{'Área'}}</label>
  <input type="number" class="form-control {{ $errors-> has('area')?'is-invalid':'' }}" name="area" id="area" value="{{ isset ($admin->area)?$admin->area:  old('area') }}">
  {!! $errors->first('area' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <div class="form-group">
  <label class="control-label" for="nombre">{{'Extensión'}}</label>
  <input type="number" class="form-control {{ $errors-> has('extension')?'is-invalid':''  }}" name="extension" id="extension" value="{{ isset ($admin->extension)?$admin->extension:  old('extension') }}">
  {!! $errors->first('extension' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

<form>
  <div class="form-group">
  <label for="exampleFormControlSelect1"for="estado">{{'Estado'}}</label>
  <select class="form-control {{ $errors-> has('estado')?'is-invalid':''}}" name="estado" id="estado" value="{{ isset ($admin->estado)?$admin->estado:old('estado') }}" aria-label="Default select example">
  <option selected>Seleccione estado</option>
  <option value="Abierto">Abierto</option>
    <option value="Cerrado">Cerrado</option>
    <option value="Pendiente">Pendiente</option>
        </select>
    {!! $errors->first('estado' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('lote/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>