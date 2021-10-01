@extends('capataz')

@section('form')

<div class="container">

	@if(Session::has('Mensaje'))
	<div class="alert alert-success" role="alert">
		{{ Session::get('Mensaje') }}
	</div>
	@endif


	<a href="{{ url('bovino/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Bovino">
		<i class="fas fa-user-plus"></i>
	</a>
	<br>
	<br>

	<h5><strong>Lista de Bovinos</strong></h5>
	<table class="table table-dark">
		<thead class="thead-light">
			<tr>
				<th>Id</th>
				<th>Raza</th>
				<th>Peso</th>
				<th>Edad</th>
				<th>Finalidad</th>
				<th>Estado</th>
				<th>Fecha de ingreso</th>
				<th>Lote</th>
				<th>Usuario</th>
				<th>Acciones</th>

			</tr>
		</thead>
		<tbody>
			@foreach ($bovinos as $res)
			<tr>
				<td>{{ $res->id_bovino }}</td>
				<td>{{ $res->raza->nombre_raz }}</td>
				<td>{{ $res->peso_bovino }}</td>
				<td>{{ $res->edad_bovino }}</td>
				<td>{{ $res->finalidad_bovino }}</td>
				<td>
					@if ($res->estado->nombre_estadob == 'Activo')
						<span class="badge bg-success">{{ $res->estado->nombre_estadob }}</span>
					@else
						<span class="badge bg-danger">{{ $res->estado->nombre_estadob }}</span>
					@endif
				</td>
				<td>{{ $res->fecha_bovino }}</td>
				<td>{{ $res->lote->nombre_lote }}</td>
				<td>{{ $res->usuario->nombres_usuario }} {{ $res->usuario->apellidos_usuario }}</td>
				<td>
					<a class="btn btn-dark" href="{{ url('/bovino/'.$res->id_bovino.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
						<i class="far fa-edit"></i>

					</a>

					<form method="post" action="{{ url('/bovino/'.$res->id_bovino) }}"  style="display: inline;">
						{{csrf_field() }}
						{{ method_field('DELETE') }}

						<button class="btn btn-dark" type="submit" data-toggle="tooltip" data-placement="left" title="Borrar" onclick="return confirm('¿Borrar?')">
							<i class="far fa-trash-alt"></i>
						</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center" style="padding-left: 200px;">
		{{ $bovinos->links() }}
	</div>
</div>
@endsection
