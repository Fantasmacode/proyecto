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
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lotes as $lote)
            <tr>
                <td>{{ $lote->id_lote }}</td>
                <td>{{ $lote->area_lote }}</td>
                <td>{{ $lote->extension_lote }}</td>
                <td>{{ $lote->nombre_lote }}</td>
                <td>{{ $lote->fecha_lote }}</td>
                <td>
                    @if ($lote->estado->nombre_estadol == 'Abierto')
                    <span class="badge bg-success">{{ $lote->estado->nombre_estadol }}</span>
                    @elseif($lote->estado->nombre_estadol == 'Cerrado')
                    <span class="badge bg-danger">{{ $lote->estado->nombre_estadol }}</span>
                    @else
                    <span class="badge bg-warning">{{ $lote->estado->nombre_estadol }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center" style="padding-left: 250px;">
    </div>
</div>
@endsection
