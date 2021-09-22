	<form>
	<div class="form-group">
	<label for="exampleFormControlSelect1"for="nombrebovino">{{'Bovino'}}</label>
	<select class="form-control {{ $errors-> has('nombrebovino')?'is-invalid':''}}" name="nombrebovino" id="nombrebovino" value="{{ isset ($admin->nombrebovino)?$admin->nombrebovino:old('nombrebovino') }}" aria-label="Default select example">
		
	<option selected>Seleccione Bovino</option>
	@foreach (DB::table('bovinos')->Get() as $nombrebovino)
	<option value="{{$nombrebovino->idbovino}}">{{$nombrebovino->idbovino}}</option>
     @endforeach
    </select>
    <br>

  


  

  



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

<a class="btn btn-secondary" href="{{ url('retorno/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>