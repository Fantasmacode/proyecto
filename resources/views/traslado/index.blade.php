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


<a href="{{ url('traslado/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Traslado">
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
			<th>Motivo de traslado</th>
			<th>Fecha de salida</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($traslados as $res)
		<tr>
			@foreach(DB::table('bovinos')->where('idbovino', '=', $res->bovino)->get() as $bovi)
			<td>{{ $res->idtraslado }}</td>
			<td>{{ $res->bovino }}</td>
			@foreach(DB::table('razas')->where('idraza', '=', $bovi->raza)->get() as $za)
			<td>{{$za->nombreraza}}</td>
			@endforeach
			<th>{{ $res->motivo }}</th>
			<th>{{ $res->fechasalida }}</th>
			@endforeach
			<td>


				
            <a class="btn btn-light" href="{{ url('/traslado/'.$res->idtraslado.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>


				<form method="post" action="{{ url('/traslado/'.$res->idtraslado) }}"  style="display: inline;">
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
	{{ $traslados->links() }}
</div>
</div>
@endsection
