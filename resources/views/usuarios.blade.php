@extends('home')

@section('form')

<div class="container">

<br>
<br>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Area</th>
            <th>Extension</th>
            <th>Nombre de Lote</th>
            <th>Fecha de Creacion</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach (DB::table('lotes')->get() as $lote)
        <tr>
            <td>{{ $lote->idlote }}</td>
            <td>{{ $lote->area }}</td>
            <td>{{ $lote->extension }}</td>
            <td>{{ $lote->nombrelote }}</td>
            <td>{{ $lote->fechacreacion }}</td>
           
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
