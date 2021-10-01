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
            <th>Fecha de Retorno</th>
            <th>Hora de Retorno</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($retornos as $retorno)
        <tr>
            <td>{{ $retorno->id_retorno }}</td>
            <td>{{ $retorno->bovino->id_bovino }}</td>
            <td>{{ $retorno->bovino->raza->nombre_raz }}</td>
            <td>{{ $retorno->fechar_traslado }}</td>
            <td>{{ $retorno->horar_traslado }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
