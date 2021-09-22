@extends('capataz')

@section('form')

<div class="container">
	
</div>

<div class="container">
@if(Session::has('Mensaje'))
<div class="alert alert-succes" role="alert">
	{{  Session::get('Mensaje') }}	
</div>

@endif


<a href="{{ url('lote/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Lote">
	<i class="fas fa-user-plus"></i>
</a>
<br>
<br>

<table class="table table-dark">
	<thead class="thead-light">
		<tr>
			<th>Id</th>
			<th>Área</th>
			<th>Extension</th>
			<th>Nombre de Lote</th>
			<th>Estado</th>
			<th>Fecha de Creación</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($lotes as $res)
		<tr>
			<td>{{ $res->idlote }}</td>
			<td>{{ $res->area }}</td>
			<td>{{ $res->extension }}</td>
			<td>{{ $res->nombrelote }}</td>
			<td>{{ $res->estado }}</td>
			<th>{{ $res->fechacreacion }}</th>
			<td>

				<a class="btn btn-light" href="{{ url('/lote/'.$res->idlote.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>

				<form method="post" action="{{ url('/lote/'.$res->idlote) }}"  style="display: inline;">
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
	{{ $lotes->links() }}
</div>
</div>
@endsection
