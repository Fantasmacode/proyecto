@extends('capataz')

@section('form')

<div class="container-fluid">
	
</div>

<div class="container">
@if(Session::has('Mensaje'))
<div class="alert alert-success" role="alert">
{{ Session::get('Mensaje') }}
</div>
@endif


<a href="{{ url('proveedor/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Proveedor">
	<i class="fas fa-industry alt"></i>
</a>
<br>
<br>

<table class="table table-dark">
	<thead class="thead-light">
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Correo</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($proveedores as $res)
		<tr>
			<td>{{ $res->id_proveedores }}</td>
			<td>{{ $res->nombre_proveedores }}</td>
			<td>{{ $res->direccion_proveedores }}</td>
			<th>{{ $res->telefono_proveedores }}</th>
			<th>{{ $res->correo_proveedores }}</th>
			<td>


				
            <a class="btn btn-light" href="{{ url('/proveedor/'.$res->id_proveedores.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>


				<form method="post" action="{{ url('/proveedor/'.$res->id_proveedores) }}"  style="display: inline;">
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
<div class="text-center" style="padding-left: 250px;">
	{{ $proveedores->links() }}
</div>
</div>
@endsection
