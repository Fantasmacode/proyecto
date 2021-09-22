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


<a href="{{ url('retorno/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Traslado">
	<i class="fas fa-user-plus"></i>
</a>
<br>
<br>

<table class="table table-dark">
	<thead class="thead-light">
		<tr>
			<th>Id</th>
			<th>Bovino</th>
			<th>Raza</th>
			<th>Fecha de Retorno</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($retornos as $res)
		<tr>
			@foreach(DB::table('bovinos')->where('idbovino', '=', $res->nombrebovino)->get() as $no)
			<td>{{ $res->idretorno }}</td>
			<td>{{ $res->nombrebovino }}</td>
			@foreach(DB::table('razas')->where('idraza', '=', $no->raza)->get() as $ga)
			<td>{{$ga->nombreraza}}</td>
			@endforeach
			<th>{{ $res->fecharetorno }}</th>
			@endforeach
			<td>


				
            <a class="btn btn-light" href="{{ url('/retorno/'.$res->idretorno.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>


				<form method="post" action="{{ url('/retorno/'.$res->idretorno) }}"  style="display: inline;">
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
	{{ $retornos->links() }}
</div>
</div>
@endsection
