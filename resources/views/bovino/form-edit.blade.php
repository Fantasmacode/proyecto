  <form>
  <div class="form-group">
  <label for="exampleFormControlSelect1"for="raza">{{'Raza'}}</label>
  <select class="form-control {{ $errors-> has('raza')?'is-invalid':''}}" name="raza" id="raza" value="{{ isset ($admin->raza)?$admin->raza:old('raza') }}" aria-label="Default select example">
  
  @forelse(DB::table('bovinos')->where('idbovino', '=', $admin->idbovino)->get() as $bo)
  @foreach (DB::table('razas')->where('idraza', '=', $bo->raza)->Get() as $raza)
  <option value="{{$raza->idraza}}">{{$raza->nombreraza}}</option>
  @endforeach
  @foreach (DB::table('razas')->get() as $ra)
  <option value="{{$ra->idraza}}">{{$ra->nombreraza}}</option>
  @endforeach
  </select>
  @empty
  null
  @endforelse
 {!! $errors->first('raza' , '<div class="invalid-feedback">:message</div>') !!}
  </div>


  <div class="form-group">
  <label class="control-label" for="nombre">{{'Peso'}}</label>
  <input type="number" class="form-control {{ $errors-> has('peso')?'is-invalid':'' }}" name="peso" id="peso" value="{{ isset ($admin->peso)?$admin->peso:  old('peso') }}">
  {!! $errors->first('peso' , '<div class="invalid-feedback">:message</div>') !!}
  </div>


  <div class="form-group">
  <label class="control-label" for="nombre">{{'Edad'}}</label>
  <input type="number" class="form-control {{ $errors-> has('edad')?'is-invalid':'' }}" name="edad" id="edad" value="{{ isset ($admin->edad)?$admin->edad:  old('edad') }}">
  {!! $errors->first('edad' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <form>
  <div class="form-group">
  <label for="exampleFormControlSelect1"for="finalidad">{{'Finalidad'}}</label>
  <select class="form-control {{ $errors-> has('finalidad')?'is-invalid':''}}" name="finalidad" id="finalidad" aria-label="Default select example">

  <option selected>Seleccione Finalidad</option>
  <option value="Carne">Carne</option>
    <option value="Leche">Leche</option>
    <option value="Doble Propósito">Doble Propósito</option>
        </select>
    {!! $errors->first('finalidad' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <form>
  <div class="form-group">
  <label for="exampleFormControlSelect1"for="estado">{{'Estado'}}</label>
  <select class="form-control {{ $errors-> has('estado')?'is-invalid':''}}" name="estado" id="estado" value="{{ isset ($admin->estado)?$admin->estado:old('estado') }}" aria-label="Default select example">
  <option selected>Seleccione Estado</option>
  <option value="Activo">Activo</option>
    <option value="Inactivo">Inactivo</option>
        </select>
    {!! $errors->first('estado' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  

  
  <form>
  <div class="form-group">
  <label for="exampleFormControlSelect1"for="lote">{{'Lote'}}</label>
  <select class="form-control {{ $errors-> has('lote')?'is-invalid':''}}" name="lote" id="lote" value="{{ isset ($admin->lote)?$admin->lote:old('lote') }}" aria-label="Default select example">
    
  @forelse(DB::table('bovinos')->where('idbovino', '=', $admin->idbovino)->get() as $lo)
    @foreach (DB::table('lotes')->where('idlote', '=', $lo->lote)->Get() as $lote)
    <option value="{{$lote->idlote}}">{{$lote->nombrelote}}</option>
    @endforeach
    @foreach (DB::table('lotes')->get() as $te)
    <option value="{{$te->idlote}}">{{$te->nombrelote}}</option>
     @endforeach
    </select>
    @empty
    null
    @endforelse
    {!! $errors->first('lote' , '<div class="invalid-feedback">:message</div>') !!}
    </div>


  <form>
  <div class="form-group">
    @foreach(DB::table('users')->select('nombre')->where('nombre', '=', Auth::user()->nombre)->get() as $user)
  <label class="control-label" for="nombre">{{''}}</label>
  <input type="hidden" class="form-control {{ $errors-> has('usuario')?'is-invalid':''  }}" name="usuario" id="usuario" value="{{$user->nombre}}" placeholder="{{$user->nombre}}" readonly>
  {!! $errors->first('usuario' , '<div class="invalid-feedback">:message</div>') !!}
  @endforeach
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

<a class="btn btn-secondary" href="{{ url('bovino/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>

  