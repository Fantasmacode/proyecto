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
        @foreach (DB::table('bajas')->get() as $baja)
        <tr>
            @foreach(DB::table('bovinos')->where('idbovino', '=', $res->bovino)->get() as $bo)
            <td>{{ $baja->idbaja }}</td>
            <td>{{ $baja->bovino }}</td>
            @foreach(DB::table('razas')->where('idraza', '=', $bo->raza)->get() as $ra)
            <td>{{ $ra->nombreraza }}</td>
            @endforeach
            <td>{{ $baja->motivo }}</td>
            <td>{{ $baja->fechamuerte }}</td>
            @endforeach

           
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
