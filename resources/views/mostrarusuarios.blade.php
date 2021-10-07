@extends('user')

@section('form')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombres_usuario }}</td>
                        <td>{{ $usuario->apellidos_usuario }}</td>
                        <td>{{ $usuario->documento_usuario }}</td>
                        <td>{{ $usuario->correo_usuario }}</td>
                        <td>{{ $usuario->telefono_usuario }}</td>
                        <td>{{ $usuario->rol_usuario }}</td>
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
