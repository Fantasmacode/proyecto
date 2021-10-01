@extends('home')

@section('form')

@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
</div>
@endif
@if(Session::has('Error'))
<div class="alert alert-danger" role="alert">
    {{ Session::get('Error') }}
</div>
@endif
<form method="post" action="{{url('user/updatepassword')}}">
    {{csrf_field()}}
    <div class="form-group">
        <label for="contrasena">Introduce tu actual contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" class="form-control {{ $errors-> has('contrasena')?'is-invalid':''}}" value="{{  old('contrasena') }}">
        <div class="text-danger">{{$errors->first('contrasena')}}</div>
    </div>
    <div class="form-group">
        <label for="contrasena_usuario">Introduce tu nueva contraseña:</label>
        <input type="password" name="contrasena_usuario" id="contrasena_usuario" class="form-control {{ $errors-> has('contrasena_usuario')?'is-invalid':''}}" value="{{  old('contrasena_usuario') }}">
        <div class="text-danger">{{$errors->first('contrasena_usuario')}}</div>
    </div>
    <div class="form-group">
        <label for="contrasena_usuario_confirmation">Confirma tu nueva contraseña:</label>
        <input type="password" name="contrasena_usuario_confirmation" id="contrasena_usuario_confirmation" class="form-control" value="{{  old('contrasena_usuario_confirmation') }}">
    </div>
    <div class="d-inline">
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>
        <a class="btn btn-secondary" href="{{route('home')}}">regresar</a>
    </div>
</form>
@endsection
