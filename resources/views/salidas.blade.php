@extends('home')

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
            <th>Motivo de traslado</th>
            <th>Fecha de salida</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach (DB::table('traslados')->get() as $traslado)
        <tr>
            @foreach(DB::table('bovinos')->where('idbovino', '=', $traslado->bovino)->get() as $bovi)
            <td>{{ $traslado->idtraslado }}</td>
            <td>{{ $traslado->bovino }}</td>
            @foreach(DB::table('razas')->where('idraza', '=', $bovi->raza)->get() as $za)
            <td>{{ $za->nombreraza }}</td>
            @endforeach
            <td>{{ $traslado->motivo }}</td>
            <td>{{ $traslado->fechasalida }}</td>
            @endforeach

           
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
