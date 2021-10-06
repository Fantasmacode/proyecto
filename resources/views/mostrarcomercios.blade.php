@extends('user')

@section('form')

<div class="container">

<br>
<br>

<h5><strong>Lista de Comercios</strong></h5>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Tipo de comercio</th>
            <th>Proveedores</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($comercios as $comercio)
        <tr>
            <td>{{ $comercio->id_comercio }}</td>
            <td>{{ $comercio->tipo_comercio }}</td>
            <td>{{ $comercio->proveedor->nombre_proveedores }}</td>
            <td>{{ $comercio->fecha_comercio }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
