@extends('user')

@section('form')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Bovinos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
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
                <tfoot>
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
                </tfoot>
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
                            @if ($bovino->estado->nombre_estadob== 'Activo')
                                <span class="badge bg-success text-white">{{ $bovino->estado->nombre_estadob }}</span>
                            @else
                                <span class="badge bg-danger text-white">{{ $bovino->estado->nombre_estadob }}</span>
                            @endif
                        </td>
                        <th>{{ $bovino->fecha_bovino }}</th>
                        <th>{{ $bovino->lote->nombre_lote }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
