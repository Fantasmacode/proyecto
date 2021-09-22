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
		@foreach ($estadolotes as $res)
		<tr>
			<td>{{ $res->idestadolote }}</td>
			<th>{{ $res->estado }}</th>
			<td>


				
            <a class="btn btn-light" href="{{ url('/estadolote/'.$res->idestadolote.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>


				<form method="post" action="{{ url('/estadolote/'.$res->idestadolote) }}"  style="display: inline;">
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
	{{ $estadolotes->links() }}
</div>
</div>
@endsection
