@extends('capataz')

@section('form')

<div class="container">

@if(Session::has('Mensaje'))

<div class="valid-feedback" role="alert">
	{{  Session::get('Mensaje') }}	
</div>

@endif


<a href="{{ url('ubicacion/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Ubicacion">
	<i class="fas fa-user-plus"></i>
</a>
<br>
<br>

<table class="table table-dark">
	<thead class="thead-light">
		<tr>
			<th>Id</th>
			<th>Latitud</th>
			<th>Longitud</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($ubicacions as $res)
		<tr>
			<td>{{ $res->idubicacion }}</td>
			<td>{{ $res->latitud }}</td>
			<th>{{ $res->longitud }}</th>
			<td>

				<a class="btn btn-light" href="{{ url('/ubicacion/'.$res->idubicacion.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>

				<form method="post" action="{{ url('/ubicacion/'.$res->idubicacion) }}"  style="display: inline;">
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
	{{ $ubicacions->links() }}
</div>
</div>
@endsection
