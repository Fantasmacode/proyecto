@extends('user')

@section('form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Lotes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Area</th>
                        <th>Extension</th>
                        <th>Nombre de Lote</th>
                        <th>Fecha de Creacion</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Area</th>
                        <th>Extension</th>
                        <th>Nombre de Lote</th>
                        <th>Fecha de Creacion</th>
                        <th>Estado</th>
                    </tr>
                </tfoot>
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
                            <span class="badge bg-success text-white">{{ $lote->estado->nombre_estadol }}</span>
                            @elseif($lote->estado->nombre_estadol == 'Cerrado')
                            <span class="badge bg-danger text-white">{{ $lote->estado->nombre_estadol }}</span>
                            @else
                            <span class="badge bg-warning text-white">{{ $lote->estado->nombre_estadol }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center" style="padding-left: 250px;">
            </div>
        </div>
    </div>
</div>
@endsection
