@extends('user')

@section('form')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Bajas</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Bovino</th>
                        <th>Raza</th>
                        <th>Motivo</th>
                        <th>Fecha de Muerte</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Bovino</th>
                        <th>Raza</th>
                        <th>Motivo</th>
                        <th>Fecha de Muerte</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($bajas as $baja)
                    <tr>
                        <td>{{ $baja->id_baja }}</td>
                        <td>{{ $baja->bovino->id_bovino }}</td>
                        <td>{{ $baja->bovino->raza->nombre_raz }}</td>
                        <td>{{ $baja->motivo_baja }}</td>
                        <td>{{ $baja->fecha_baja }}</td>
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
