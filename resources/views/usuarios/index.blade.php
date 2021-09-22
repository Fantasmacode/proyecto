@extends('home')

@section('form')

<div class="container">

@if(Session::has('Mensaje'))

<div class="valid-feedback" role="alert">
	{{  Session::get('Mensaje') }}	
</div>

@endif


<a href="{{ url('usuarios/create') }}" class="btn btn-info">Agregar Usuario</a>
<br>
<br>

<table class="table table-dark">
	<thead class="thead-light">
		<tr>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Tipo Documento</th>
			<th>Número Documento</th>
			<th>Teléfono</th>
			<th>Correo</th>
			<th>Rol</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($usuarios as $res)
		<tr>
			<td>{{ $res->nom_res }}</td>
			<td>{{ $res->ape_res }}</td>
			<td>{{ $res->tip_doc }}</td>
			<td>{{ $res->num_res }}</td>
			<th>{{ $res->tel_res }}</th>
			<th>{{ $res->cor_res }}</th>
			<th>{{ $res->nom_rol }}</th>
			<td>

				<a href="{{ url('/usuarios/'.$res->id.'/edit') }}" class="btn btn-info">
					Editar
				</a>

				<form method="post" action="{{ url('/usuarios/'.$res->id) }}" style="display: inline;">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button class="btn btn-light" type="submit" onclick="return confirm('¿Borrar?')">Borrar</button>
					
				</form>
					

			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
	{{ $usuarios->links() }}
</div>
</div>
@endsection
