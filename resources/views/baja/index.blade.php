@extends('capataz')

@section('form')

<div class="container">

@if(Session::has('Mensaje'))

<div class="valid-feedback" role="alert">
	{{  Session::get('Mensaje') }}	
</div>

@endif


<a href="{{ url('baja/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Baja">
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
			<th>Motivo</th>
			<th>Fecha de Muerte</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($bajas as $res)
		<tr>
			@foreach(DB::table('bovinos')->where('idbovino', '=', $res->bovino)->get() as $bo)
			<td>{{ $res->idbaja }}</td>
			<td>{{ $res->bovino }}</td>
			@foreach(DB::table('razas')->where('idraza', '=', $bo->raza)->get() as $ra)
			<td>{{$ra->nombreraza}}</td>
			@endforeach
			<td>{{ $res->motivo }}</td>
			<th>{{ $res->fechamuerte }}</th>
			@endforeach
			<td>

				<a class="btn btn-light" href="{{ url('/baja/'.$res->idbaja.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>

				<form method="post" action="{{ url('/baja/'.$res->idbaja) }}"  style="display: inline;">
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
	{{ $bajas->links() }}
</div>
</div>
@endsection
