@extends('capataz')

@section('form')

<div class="card shadow mb-4">
	<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Lotes</h6>
    </div>
    <div class="card-body">
		@if(Session::has('Mensaje'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('Mensaje') }}
		</div>
		@endif

		<a href="{{ url('lote/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Lote">
			<i class="fas fa-user-plus"></i>
		</a>
		<br>
		<br>

		<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Área</th>
						<th>Extension</th>
						<th>Nombre de Lote</th>
						<th>Estado</th>
						<th>Fecha de Creación</th>
						<th>Fecha de Cierre</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Id</th>
						<th>Área</th>
						<th>Extension</th>
						<th>Nombre de Lote</th>
						<th>Estado</th>
						<th>Fecha de Creación</th>
						<th>Fecha de Cierre</th>
						<th>Acciones</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($lotes as $res)
					<tr>
						<td>{{ $res->id_lote }}</td>
						<td>{{ $res->area_lote }}</td>
						<td>{{ $res->extension_lote }}</td>
						<td>{{ $res->nombre_lote }}</td>
						<td>
							@if ($res->estado->nombre_estadol == 'Abierto')
								<span class="badge bg-success text-white">{{ $res->estado->nombre_estadol }}</span>
							@elseif($res->estado->nombre_estadol == 'Cerrado')
								<span class="badge bg-danger text-white">{{ $res->estado->nombre_estadol }}</span>
							@else
								<span class="badge bg-warning text-white">{{ $res->estado->nombre_estadol }}</span>
							@endif
						</td>
						<td>{{ $res->fecha_lote }}</td>
						<td>{{ $res->fcierre_lote }}</td>
						<td>

							<a class="btn btn-light" href="{{ url('/lote/'.$res->id_lote.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
								<i class="far fa-edit"></i>

							</a>

							<form method="post" action="{{ url('/lote/'.$res->id_lote) }}"  style="display: inline;">
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
				{{ $lotes->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
