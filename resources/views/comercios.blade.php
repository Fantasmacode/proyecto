@extends('home')

@section('form')

<div class="container">

<br>
<br>

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
        @foreach (DB::table('comercios')->get() as $comercio)
        <tr>
            <td>{{ $comercio->idcomercio }}</td>
            <td>{{ $comercio->tipocomercio }}</td>
            <td>{{ $comercio->proveedor }}</td>
            <td>{{ $comercio->fecha }}</td>

           
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
