@extends('capataz')

@section('form')

<div class="container">
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

<table class="table table-dark">
	<thead class="thead-light">
		<tr>
			<th>Id</th>
			<th>Nombre de Raza</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($razas as $res)
		<tr>
			<td>{{ $res->id_raz }}</td>
			<th>{{ $res->nombre_raz }}</th>
			<td>

				<a class="btn btn-light" href="{{ url('/raza/'.$res->id_raz.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>

			<form method="post" action="{{ url('/raza/'.$res->id_raz) }}"  style="display: inline;">
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
	{{ $razas->links() }}
</div>
</div>
@endsection
