@extends('home')
@section('form')

<div class="container-fluid">
    <!-- Page Heading -->
    <!--<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registro de Usuarios</h1>
    </div>-->
</div>

<div class="container">
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

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Nombre</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
            @foreach ($administrador as $admin)   
        <tr>
            <td>{{$admin -> nombre}}{{$admin -> Apellido}}</td>
            <td>{{$admin -> documento}}</td>
            <td>{{$admin -> email}}</td>
            <th>{{$admin -> telefono}}</th>
            <th>{{$admin -> rol}}</th>
            <td>   

    
            <a class="btn btn-light" href="{{ url('/administrador/'.$admin->id.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>

            <form method="post" action="{{ url('/administrador/'.$admin->id) }}"  style="display: inline;">
            {{csrf_field() }}
            {{ method_field('DELETE') }}
    
            <button class="btn btn-light" type="submit" data-toggle="tooltip" data-placement="left" title="Borrar" onclick="return confirm('¿Borrar?')">
                <i class="far fa-trash-alt"></i>
                 
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
@endsection