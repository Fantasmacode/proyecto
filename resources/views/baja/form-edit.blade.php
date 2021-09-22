  <form>
  <div class="form-group">
  <label for="exampleFormControlSelect1"for="bovino">{{'Bovino'}}</label>
  <select class="form-control {{ $errors-> has('bovino')?'is-invalid':''}}" name="bovino" id="bovino" value="{{ isset ($admin->bovino)?$admin->bovino:old('bovino') }}" aria-label="Default select example">
    
  @forelse(DB::table('bajas')->where('idbaja', '=', $admin->idbaja)->get() as $ba)
    @foreach (DB::table('bovinos')->where('idbovino', '=', $ba->bovino)->Get() as $bovino)
    <option value="{{$bovino->idbovino}}">{{$bovino->idbovino}}</option>
    @endforeach
    @foreach (DB::table('bovinos')->get() as $ju)
    <option value="{{$ju->idbovino}}">{{$ju->idbovino}}</option>
     @endforeach
    </select>
    @empty
    null
    @endforelse
    {!! $errors->first('bovino' , '<div class="invalid-feedback">:message</div>') !!}
    </div>

  <div class="form-group">
  <label class="control-label" for="nombre">{{'Motivo de Muerte'}}</label>
  <input type="text" class="form-control {{ $errors-> has('motivo')?'is-invalid':'' }}" name="motivo" id="motivo" value="{{ isset ($admin->motivo)?$admin->motivo:  old('motivo') }}">
  {!! $errors->first('motivo' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('baja/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>