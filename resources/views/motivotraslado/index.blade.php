@extends('capataz')

@section('form')

<div class="container-fluid">
	
</div>

<div class="container">
@if(Session::has('Mensaje'))
<div class="alert alert-succes" role="alert">
	{{  Session::get('Mensaje') }}	
</div>

@endif


<a href="{{ url('motivotraslado/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar">
	<i class="fas fa-user-plus"></i>
</a>
<br>
<br>

<table class="table table-dark">
	<thead class="thead-light">
		<tr>
			<th>Id</th>
			<th>Motivo</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($motivotraslados as $res)
		<tr>
			<td>{{ $res->idmotivotraslado }}</td>
			<th>{{ $res->motivo }}</th>
			<td>


				
            <a class="btn btn-light" href="{{ url('/motivotraslado/'.$res->idmotivotraslado.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>


				<form method="post" action="{{ url('/motivotraslado/'.$res->idmotivotraslado) }}"  style="display: inline;">
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
	{{ $motivotraslados->links() }}
</div>
</div>
@endsection
