@extends('user')

@section('form')

<div class="container">

<br>
<br>

<h5><strong>Lista de Salidas</strong></h5>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Bovino</th>
            <th>Raza</th>
            <th>Motivo de traslado</th>
            <th>Fecha de salida</th>
            <th>Hora de salida</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salidas as $salida)
        <tr>
            <td>{{ $salida->id_traslado }}</td>
            <td>{{ $salida->bovino->id_bovino }}</td>
            <td>{{ $salida->bovino->raza->nombre_raz }}</td>
            <td>{{ $salida->motivo->motivo_moti }}</td>
            <td>{{ $salida->fechas_traslado }}</td>
            <td>{{ $salida->horas_traslado }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
