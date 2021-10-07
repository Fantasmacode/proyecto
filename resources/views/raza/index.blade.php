@extends('capataz')

@section('form')

<div class="card shadow mb-4">
	<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Razas</h6>
    </div>
    <div class="card-body">
		@if(Session::has('Mensaje'))
		<div class="alert alert-success" role="alert">
		{{ Session::get('Mensaje') }}
		</div>
		@endif


		<a href="{{ url('raza/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar raza">
			<i class="fas fa-user-plus"></i>
		</a>
		<br>
		<br>

		<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre de Raza</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Id</th>
						<th>Nombre de Raza</th>
						<th>Acciones</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($razas as $res)
					<tr>
						<td>{{ $res->id_raz }}</td>
						<td>{{ $res->nombre_raz }}</td>
						<td>
							<a class="btn btn-light" href="{{ url('/raza/'.$res->id_raz.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
				                <i class="far fa-edit"></i>

				            </a>
							<form method="post" action="{{ url('/raza/'.$res->id_raz) }}"  style="display: inline;">
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
				{{ $razas->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
