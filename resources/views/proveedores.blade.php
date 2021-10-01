@extends('home')

@section('form')

<div class="container">

<br>
<br>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $proveedor)
        <tr>
            <td>{{ $proveedor->id_proveedores }}</td>
            <td>{{ $proveedor->nombre_proveedores }}</td>
            <td>{{ $proveedor->direccion_proveedores }}</td>
            <th>{{ $proveedor->telefono_proveedores }}</th>
            <th>{{ $proveedor->correo_proveedores }}</th>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
