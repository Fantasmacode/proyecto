@extends('user')

@section('form')

<div class="container">

<br>
<br>

<h5><strong>Lista de Lotes</strong></h5>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Area</th>
            <th>Extension</th>
            <th>Nombre de Lote</th>
            <th>Fecha de Creacion</th>
            <th>Fecha de Cierre</th>
            <th>Cantidad de Bovinos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lotes as $lote)
        <tr>
            <td>{{ $lote->id_lote }}</td>
            <td>{{ $lote->area_lote }}</td>
            <td>{{ $lote->extension_lote }}</td>
            <td>{{ $lote->nombre_lote }}</td>
            <td>{{ $lote->fecha_lote }}</td>
            <td>{{ $lote->fcierre_lote }}</td>
            <td>{{ $lote->bovinos_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
