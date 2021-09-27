@extends('capataz')

@section('form')

<div class="container">

@if(Session::has('Mensaje'))

<div class="valid-feedback" role="alert">
	{{  Session::get('Mensaje') }}	
</div>

@endif


<br>


<a href="{{ url('comercio/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Comercio">
	<i class="fas fa-shopping-cart"></i>
</a>



<br>
<br>

<table class="table table-dark">
	<thead class="thead-light">
		<tr>
			<th>Id</th>
			<th>Tipo de Comercio</th>
			<th>Proveedores</th>
			<th>Fecha</th>
			<th>Acciones</th>
			
		</tr>

	</thead>

	
</a>
	<tbody>
		@foreach ($comercio as $res)
		<tr>
			<td>{{ $res->id_comercio }}</td>
			<td>{{ $res->tipo_comercio }}</td>
			<td>{{ $res->proveedor->nombre_proveedores }}</td>
			<th>{{ $res->fecha_comercio }}</th>
			<td>
				<a class="btn btn-light" href="{{ url('/comercio/'.$res->id_comercio.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
					<i class="far fa-edit"></i>
				</a>

				<form method="post" action="{{ url('/comercio/'.$res->id_comercio) }}"  style="display: inline;">
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
	{{ $comercio->links() }}
</div>
</div>
@endsection
