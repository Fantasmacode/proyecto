  <form>
  <div class="form-group">
  <label for="exampleFormControlSelect1"for="comercio">{{'Comercio'}}</label>
  <select class="form-control {{ $errors-> has('tipocomercio')?'is-invalid':''}}" name="tipocomercio" id="tipocomercio" value="{{ isset ($admin->tipocomercio)?$admin->tipocomercio:old('tipocomercio') }}" aria-label="Default select example">
  <option selected>Seleccione Tipo de Comercio</option>
  <option value="Venta">Venta</option>
    <option value="Compra">Compra</option>
        </select>
    {!! $errors->first('tipocomercio' , '<div class="invalid-feedback">:message</div>') !!}
  </div>

  <form>
  <div class="form-group">
  <label for="exampleFormControlSelect1"for="proveedor">{{'Proveedor'}}</label>
  <select class="form-control {{ $errors-> has('proveedor')?'is-invalid':''}}" name="proveedor" id="proveedor" value="{{ isset ($admin->proveedor)?$admin->proveedor:old('proveedor') }}" aria-label="Default select example">
    
  @forelse(DB::table('comercios')->where('idcomercio', '=', $admin->idcomercio)->get() as $co)
    @foreach (DB::table('proveedors')->where('idproveedor', '=', $co->proveedor)->Get() as $proveedor)
    <option value="{{$proveedor->idproveedor}}">{{$proveedor->nombre}}</option>
    @endforeach
    @foreach (DB::table('proveedors')->get() as $pro)
    <option value="{{$pro->idproveedor}}">{{$pro->nombre}}</option>
     @endforeach
    </select>
    @empty
    null
    @endforelse
    {!! $errors->first('proveedor' , '<div class="invalid-feedback">:message</div>') !!}
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

<a class="btn btn-secondary" href="{{ url('comercio/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>


