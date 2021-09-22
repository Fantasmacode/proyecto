@extends('capataz')

@section('form')

<div class="container-fluid">
	
</div>

<div class="container">
@if(Session::has('Mensaje'))
<div class="alert alert-succes" role="alert">
	{{  Session::get('Mensaje') }}	
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
		@foreach ($proveedors as $res)
		<tr>
			<td>{{ $res->idproveedor }}</td>
			<td>{{ $res->nombre }}</td>
			<td>{{ $res->direccion }}</td>
			<th>{{ $res->telefono }}</th>
			<th>{{ $res->correo }}</th>
			<td>


				
            <a class="btn btn-light" href="{{ url('/proveedor/'.$res->idproveedor.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>


				<form method="post" action="{{ url('/proveedor/'.$res->idproveedor) }}"  style="display: inline;">
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
	{{ $proveedors->links() }}
</div>
</div>
@endsection
