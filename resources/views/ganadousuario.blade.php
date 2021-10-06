@extends('user')

@section('form')

<div class="container-fluid">
    
</div>

<div class="container">


<br>
<br>

<h5><strong>Lista de Usuarios</strong></h5>

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
       @foreach ($bovinos as $bovino)
        <tr>
            <td>{{ $bovino->id_bovino }}</td>
            <td>{{ $bovino->peso_bovino }}</td>
            <td>{{ $bovino->edad_bovino }}</td>
            <td>{{ $bovino->raza->nombre_raz }}</td>
            <td>{{ $bovino->finalidad_bovino }}</td>
            <td>{{ $bovino->usuario->nombres_usuario }} {{ $bovino->usuario->apellidos_usuario }}</td>
            <td>
                @if ($bovino->estado->nombre_estadob == 'Activo')
                    <span class="badge bg-success">{{ $bovino->estado->nombre_estadob }}</span>
                @else
                    <span class="badge bg-danger">{{ $bovino->estado->nombre_estadob }}</span>
                @endif
            </td>
            <th>{{ $bovino->fecha_bovino }}</th>
            <th>{{ $bovino->lote->nombre_lote }}</th>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">

</div>
</div>
@endsection
