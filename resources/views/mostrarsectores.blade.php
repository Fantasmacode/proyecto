@extends('user')

@section('form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Sectores</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Lote</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Lote</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($sectores as $sector)
                    <tr>
                        <td>{{ $sector->id_sectorizacion }}</td>
                        <td>{{ $sector->lote->nombre_lote }}</td>
                        <td>{{ $sector->latitud_sectorizacion }}</td>
                        <td>{{ $sector->longitud_sectorizacion }}</td>
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
