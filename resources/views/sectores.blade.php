@extends('home')

@section('form')

<div class="container">

<br>
<br>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Latitud</th>
            <th>Longitud</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach (DB::table('sectorizacions')->get() as $sectorizacion)
        <tr>
            <td>{{ $sectorizacion->idsectorizacion }}</td>
            <td>{{ $sectorizacion->latitud }}</td>
            <td>{{ $sectorizacion->longitud }}</td>
            
           
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
