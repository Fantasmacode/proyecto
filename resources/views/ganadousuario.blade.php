@extends('user')

@section('form')

<div class="container-fluid">
    
</div>

<div class="container">


<br>
<br>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Peso</th>
            <th>Edad</th>
            <th>Raza</th>
            <th>Finalidad</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th>Fecha de ingreso</th>
            <th>Lote</th>
            
        </tr>
    </thead>
    <tbody>
       @foreach (DB::table('bovinos')->get() as $bovino)
        <tr>
            <td>{{ $bovino->idbovino }}</td>
            <td>{{ $bovino->peso }}</td>
            <td>{{ $bovino->edad }}</td>
            <td>{{ $bovino->raza }}</td>
            <td>{{ $bovino->finalidad }}</td>
            <td>{{ $bovino->usuario }}</td>
            <td>{{ $bovino->estado }}</td>
            <th>{{ $bovino->fechaingreso }}</th>
            <th>{{ $bovino->lote }}</th>
            
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">

</div>
</div>
@endsection
