@extends('home')

@section('form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Comercios</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo de comercio</th>
                        <th>Proveedor</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Tipo de comercio</th>
                        <th>Proveedor</th>
                        <th>Fecha</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($comercios as $comercio)
                    <tr>
                        <td>{{ $comercio->id_comercio }}</td>
                        <td>{{ $comercio->tipo_comercio }}</td>
                        <td>{{ $comercio->proveedor->nombre_proveedores }}</td>
                        <td>{{ $comercio->fecha_comercio }}</td>
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
