@extends('user')

@section('form')

<div class="container">

<br>
<br>

<h5><strong>Lista de Sectores</strong></h5>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Lote</th>
            <th>Latitud</th>
            <th>Longitud</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sectores as $sector)
        <tr>
            <td>{{ $sector->id_sectorizacion }}</td>
            <td>{{ $sector->lote->nombre_lote }}</td>
            <td>{{ $sector->latitud_sectorizacion }}</td>
            <td>{{ $sector->longitud_sectorizacion }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
