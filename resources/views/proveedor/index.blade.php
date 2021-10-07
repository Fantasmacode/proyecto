@extends('capataz')

@section('form')

<div class="card shadow mb-4">
	<div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Proveedores</h6>
    </div>
    <div class="card-body">
		@if(Session::has('Mensaje'))
		<div class="alert alert-success" role="alert">
		{{ Session::get('Mensaje') }}
		</div>
		@endif

		<a href="{{ url('proveedor/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Proveedor">
			<i class="fas fa-industry alt"></i>
		</a>
		<br>
		<br>

		<div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Dirección</th>
						<th>Teléfono</th>
						<th>Correo</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Id</th>
						<th>Nombre</th>
						<th>Dirección</th>
						<th>Teléfono</th>
						<th>Correo</th>
						<th>Acciones</th>
					</tr>
				</tfoot>
				<tbody>
					@foreach ($proveedores as $res)
					<tr>
						<td>{{ $res->id_proveedores }}</td>
						<td>{{ $res->nombre_proveedores }}</td>
						<td>{{ $res->direccion_proveedores }}</td>
						<td>{{ $res->telefono_proveedores }}</td>
						<td>{{ $res->correo_proveedores }}</td>
						<td>
				            <a class="btn btn-light" href="{{ url('/proveedor/'.$res->id_proveedores.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
				                <i class="far fa-edit"></i>

				            </a>
							<form method="post" action="{{ url('/proveedor/'.$res->id_proveedores) }}"  style="display: inline;">
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
				{{ $proveedores->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
