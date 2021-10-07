@extends('user')

@section('form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Retornos</h6>
    </div>
    <div class="card-body">

        <a href="{{ url('retornos') }}" class="btn btn-success btn-sm mb-4">
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
                        <th>Fecha de Retorno</th>
                        <th>Hora de Retorno</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Bovino</th>
                        <th>Raza</th>
                        <th>Motivo de traslado</th>
                        <th>Fecha de Retorno</th>
                        <th>Hora de Retorno</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($retornos as $retorno)
                    <tr>
                        <td>{{ $retorno->id_traslado }}</td>
                        <td>{{ $retorno->bovino->id_bovino }}</td>
                        <td>{{ $retorno->bovino->raza->nombre_raz }}</td>
                        <td>{{ $retorno->motivo->motivo_moti }}</td>
                        <td>{{ $retorno->fechar_traslado }}</td>
                        <td>{{ $retorno->horar_traslado }}</td>
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
