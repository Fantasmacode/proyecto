@extends('user')

@section('form')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Proveedores</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id_proveedores }}</td>
                        <td>{{ $proveedor->nombre_proveedores }}</td>
                        <td>{{ $proveedor->direccion_proveedores }}</td>
                        <td>{{ $proveedor->telefono_proveedores }}</td>
                        <td>{{ $proveedor->correo_proveedores }}</td>
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
