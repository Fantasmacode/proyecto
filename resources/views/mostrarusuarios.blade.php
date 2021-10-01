@extends('user')

@section('form')

<div class="container">

<br>
<br>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Rol</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->nombres_usuario }}</td>
            <td>{{ $usuario->apellidos_usuario }}</td>
            <td>{{ $usuario->documento_usuario }}</td>
            <td>{{ $usuario->correo_usuario }}</td>
            <td>{{ $usuario->telefono_usuario }}</td>
            <td>{{ $usuario->rol_usuario }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
