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
            
            
        </tr>
    </thead>
    <tbody>
        @foreach (DB::table('retornos')->get() as $retorno)
        <tr>
        @foreach(DB::table('bovinos')->where('idbovino', '=', $retorno->nombrebovino)->get() as $no)
            <td>{{ $retorno->idretorno }}</td>
            <td>{{ $retorno->nombrebovino }}</td>
             @foreach(DB::table('razas')->where('idraza', '=', $no->raza)->get() as $ga)
            <td>{{ $ga->nombreraza }}</td>
            @endforeach
            <td>{{ $retorno->fecharetorno }}</td>
            @endforeach
           
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
