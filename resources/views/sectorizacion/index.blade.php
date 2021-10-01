@extends('capataz')

@section('form')

<div class="container">

	@if(Session::has('Mensaje'))
	<div class="alert alert-success" role="alert">
		{{ Session::get('Mensaje') }}
	</div>
	@endif

	<a href="{{ url('sectorizacion/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Sector">
		<i class="fas fa-user-plus"></i>
	</a>
	<br>
	<br>

	<table class="table table-dark">
		<thead class="thead-light">
			<tr>
				<th>Id</th>
				<th>Lote</th>
				<th>Latitud</th>
				<th>Longitud</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($sectorizacions as $res)
			<tr>
				<td>{{ $res->id_sectorizacion }}</td>
				<td>{{ $res->lote->nombre_lote }}</td>
				<td>{{ $res->latitud_sectorizacion }}</td>
				<th>{{ $res->longitud_sectorizacion }}</th>
				<td>
					<a class="btn btn-light" href="{{ url('/sectorizacion/'.$res->id_sectorizacion.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
						<i class="far fa-edit"></i>

					</a>

					<form method="post" action="{{ url('/sectorizacion/'.$res->id_sectorizacion) }}"  style="display: inline;">
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
	<div class="text-center" style="padding-left: 250px;">
		{{ $sectorizacions->links() }}
	</div>
</div>
@endsection
