@extends('capataz')

@section('form')

<div class="container">
	<h4>Lista de Bovinos</h4>
	<h5>
		<strong>Comercio:</strong> {{ $admin->tipo_comercio }}
	</h5>
	<h5>
		<strong>Proveedor:</strong> {{ $admin->proveedor->nombre_proveedores }}
	</h5>
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
			</tr>
		</thead>
		<tbody>
			@foreach ($admin->bovinos as $res)
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
			</tr>
			@endforeach
		</tbody>
	</table>
	<a class="btn btn-secondary" href="{{ url('comercio/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>
</div>
@endsection
