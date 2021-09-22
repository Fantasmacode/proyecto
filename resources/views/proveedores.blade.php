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
        @foreach (DB::table('proveedors')->get() as $proveedor)
        <tr>
            <td>{{ $proveedor->idproveedor }}</td>
            <td>{{ $proveedor->nombre }}</td>
            <td>{{ $proveedor->direccion }}</td>
            <th>{{ $proveedor->telefono }}</th>
            <th>{{ $proveedor->correo }}</th>
           
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
