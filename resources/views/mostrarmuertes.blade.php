@extends('user')

@section('form')

<div class="container">

<br>
<br>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Bovino</th>
            <th>Raza</th>
            <th>Motivo</th>
            <th>Fecha de Muerte</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bajas as $baja)
        <tr>
            <td>{{ $baja->id_baja }}</td>
            <td>{{ $baja->bovino->id_bovino }}</td>
            <td>{{ $baja->bovino->raza->nombre_raz }}</td>
            <td>{{ $baja->motivo_baja }}</td>
            <td>{{ $baja->fecha_baja }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
