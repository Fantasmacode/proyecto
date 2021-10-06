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

	<form action="{{ url('bovino') }}" method="GET" class="mb-4">
		<div class="row">
			<div class="col">
				<label for="Razas">Razas:</label>
				<select name="fid_raz" id="Razas" class="form-control">
					<option value="">Todas</option>
					@foreach ($razas as $raza)
						<option value="{{ $raza->id_raz }}" {{ $raza->id_raz == $selected_id['fid_raz'] ? 'selected' : '' }}>
							{{ $raza->nombre_raz }}
						</option>
					@endforeach
				</select>
			</div>
			<div class="col">
				<label for="Finalidad">Finalidad:</label>
				<select name="ffinalidad" id="Finalidad" class="form-control">
					<option value="">Todas</option>
					<option value="Carne" {{ 'Carne' == $selected_id['ffinalidad'] ? 'selected' : '' }}>
						Carne
					</option>
					<option value="Leche" {{ 'Leche' == $selected_id['ffinalidad'] ? 'selected' : '' }}>
						Leche
					</option>
					<option value="Doble Propósito" {{ 'Doble Propósito' == $selected_id['ffinalidad'] ? 'selected' : '' }}>
						Doble Propósito
					</option>
				</select>
			</div>
			<div class="col">
				<label for="Finalidad">Estado:</label> <br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="festado" id="inlineRadio1" value="" {{ $selected_id['festado'] == '' ? 'checked' : '' }}>
					<label class="form-check-label" for="inlineRadio1">Todos</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="festado" id="inlineRadio2" value="1" {{ $selected_id['festado'] == 1 ? 'checked' : '' }}>
					<label class="form-check-label" for="inlineRadio2">Activos</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="festado" id="inlineRadio3" value="2" {{ $selected_id['festado'] == 2 ? 'checked' : '' }}>
					<label class="form-check-label" for="inlineRadio3">Inactivos</label>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col">
				<label for="Finalidad">Bovino:</label> <br>
				<input type="text" name="fid_bovino" class="form-control" placeholder="Buscar bovino..." value="{{ $selected_id['fid_bovino'] }}">
			</div>
			<div class="col">
				<label for="Lotes">Lotes:</label>
				<select name="fid_lote" id="Lotes" class="form-control">
					<option value="">Todas</option>
					@foreach ($lotes as $lote)
						<option value="{{ $lote->id_lote }}" {{ $lote->id_lote == $selected_id['fid_lote'] ? 'selected' : '' }}>
							{{ $lote->nombre_lote }}
						</option>
					@endforeach
				</select>
			</div>
			<div class="col align-items-end d-flex mb-1">
				<button type="submit" class="btn btn-success btn-sm mr-1">
					<i class="fas fa-search"></i> Filtrar
				</button>
				<a href="{{ url('bovino') }}" type="button" class="btn btn-danger btn-sm">
					<i class="fas fa-redo"></i> Restablecer
				</a>
			</div>
		</div>
	</form>
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
