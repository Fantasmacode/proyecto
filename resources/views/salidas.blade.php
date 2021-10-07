@extends('home')

@section('form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Salidas</h6>
    </div>
    <div class="card-body">

        <a href="{{ url('salidas') }}" class="btn btn-success btn-sm mb-4">
            <i class="fas fa-redo"></i> Actualizar
        </a>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Bovino</th>
                        <th>Raza</th>
                        <th>Motivo de traslado</th>
                        <th>Fecha de salida</th>
                        <th>Hora de salida</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Bovino</th>
                        <th>Raza</th>
                        <th>Motivo de traslado</th>
                        <th>Fecha de salida</th>
                        <th>Hora de salida</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($salidas as $salida)
                    <tr>
                        <td>{{ $salida->id_traslado }}</td>
                        <td>{{ $salida->bovino->id_bovino }}</td>
                        <td>{{ $salida->bovino->raza->nombre_raz }}</td>
                        <td>{{ $salida->motivo->motivo_moti }}</td>
                        <td>{{ $salida->fechas_traslado }}</td>
                        <td>{{ $salida->horas_traslado }}</td>
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
