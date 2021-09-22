@extends('capataz')

@section('form')

<div class="container">

@if(Session::has('Mensaje'))

<div class="valid-feedback" role="alert">
	{{  Session::get('Mensaje') }}	
</div>

@endif



</a>
<br>
<br>

<table class="table table-dark">
	<thead class="thead-light">
		<tr>
			<th>Id</th>
			<th>Estado</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($estados as $res)
		<tr>
			<td>{{ $res->idestado }}</td>
			<th>{{ $res->nombre }}</th>
			<td>

				<a class="btn btn-light" href="{{ url('/estado/'.$res->idestado.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>

				<form method="post" action="{{ url('/estado/'.$res->idestado) }}"  style="display: inline;">
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
	{{ $estados->links() }}
</div>
</div>
@endsection
