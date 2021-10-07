@extends('home')
@section('form')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Usuarios</h6>
    </div>
    <div class="card-body">
        @if(Session::has('Mensaje'))
        <div class="alert alert-success" role="alert">
        {{ Session::get('Mensaje') }}
        </div>
        @endif

        <a href="{{ url('administrador/create') }}" class="btn btn-outline-secondary"data-toggle="tooltip" data-placement="left" title="Agregar Usuario">
            <i class="fas fa-user-plus"></i>
        </a>
        <br>
        <br>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>

                <tbody>
                        @foreach ($administrador as $admin)
                    <tr>
                        <td>{{$admin -> nombres_usuario}} {{$admin -> apellidos_usuario}}</td>
                        <td>{{$admin -> documento_usuario}}</td>
                        <td>{{$admin -> correo_usuario}}</td>
                        <td>{{$admin -> telefono_usuario}}</td>
                        <td>{{$admin -> rol_usuario}}</td>
                        <td>
                            <a class="btn btn-light" href="{{ url('/administrador/'.$admin->id_usuario.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                                <i class="far fa-edit"></i>

                            </a>
                            <form method="post" action="{{ url('/administrador/'.$admin->id_usuario) }}"  style="display: inline;">
                                {{csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-light" type="submit" data-toggle="tooltip" data-placement="left" title="Borrar" onclick="return confirm('¿Borrar?')">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $administrador->links() }}
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection