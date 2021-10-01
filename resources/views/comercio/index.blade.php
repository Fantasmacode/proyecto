@extends('capataz')

@section('form')

<div class="container">

	@if(Session::has('Mensaje'))
	<div class="alert alert-success" role="alert">
		{{ Session::get('Mensaje') }}
	</div>
	@endif


	<a href="{{ url('comercio/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Comercio">
		<i class="fas fa-shopping-cart"></i>
	</a>
	<br>
	<br>

	<h5><strong>Lista de Bovinos</strong></h5>

	<form action="{{ url('comercio') }}" method="GET" class="mb-4">
		<div class="row">
			<div class="col">
				<select name="ftipo_comercio" id="input" class="form-control">
					<option value="">Todos</option>
					<option value="Compra" {{ 'Compra' == $selected_id['ftipo_comercio'] ? 'selected' : '' }}>
						Compra
					</option>
					<option value="Venta" {{ 'Venta' == $selected_id['ftipo_comercio'] ? 'selected' : '' }}>
						Venta
					</option>
				</select>
			</div>
			<div class="col">
				<input type="submit" class="btn btn-success btn-sm" value="Filtrar">
			</div>
		</div>
	</form>

	<table class="table table-dark">
		<thead class="thead-light">
			<tr>
				<th>Id</th>
				<th>Tipo de Comercio</th>
				<th>Cantidad de Bovinos</th>
				<th>Proveedores</th>
				<th>Fecha</th>
				<th>Acciones</th>
			</tr>

		</thead>

		<tbody>
			@foreach ($comercio as $res)
			<tr>
				<td>{{ $res->id_comercio }}</td>
				<td>{{ $res->tipo_comercio }}</td>
				<td>{{ $res->bovinos_count }}</td>
				<td>{{ $res->proveedor->nombre_proveedores }}</td>
				<th>{{ $res->fecha_comercio }}</th>
				<td>
					<a class="btn btn-light" href="{{ url('/comercio/'.$res->id_comercio) }}" data-toggle="tooltip" data-placement="left" title="Bovinos">
						<i class="fas fa-check"></i>
					</a>

					<a class="btn btn-light" href="{{ url('/comercio/'.$res->id_comercio.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
						<i class="far fa-edit"></i>
					</a>

					<form method="post" action="{{ url('/comercio/'.$res->id_comercio) }}"  style="display: inline;">
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
		<tfoot class="thead-light">
			<th colspan="2"></th>
			<th colspan="4">Total: <span class="text-success text-lg">{{ $total }}</span></th>
		</tfoot>
	</table>
	<div class="text-center" style="padding-left: 250px;">
		{{ $comercio->links() }}
	</div>
</div>
@endsection
