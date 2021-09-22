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


<a href="{{ url('bovino/create') }}" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="left" title="Agregar Bovino">
	<i class="fas fa-user-plus"></i>
</a>
<br>
<br>

<table class="table table-dark">
	<thead class="thead-light">

		<tr>
			<th>Id</th>
			<th>Raza</th>
			<th>Peso</th>
			<th>Edad</th>
			<th>Finalidad</th>
			<th>Estado</th>
			<th>Fecha de ingreso</th>
			<th>Lote</th>
			<th>Usuario</th>
			<th>Acciones</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach ($bovinos as $res)
		<tr>
			<td>{{ $res->idbovino }}</td>
			
			
			@forelse(DB::table('razas')->where('idraza','=',$res->raza)->Get() as $raza)
			<td>{{ $raza->nombreraza }}</td>
			@empty
			<td>null</td>
			@endforelse

			<td>{{ $res->peso }}</td>
			<td>{{ $res->edad }}</td>
			<td>{{ $res->finalidad }}</td>
			<td>{{ $res->estado }}</td>
			<td>{{ $res->fechaingreso }}</td>
			<td>{{ $res->lote }}</td>
			<td>{{ $res->usuario }}</td>
			<td>


				
            <a class="btn btn-dark" href="{{ url('/bovino/'.$res->idbovino.'/edit') }}" data-toggle="tooltip" data-placement="left" title="Editar">
                <i class="far fa-edit"></i>
  
            </a>


				<form method="post" action="{{ url('/bovino/'.$res->idbovino) }}"  style="display: inline;">
            {{csrf_field() }}
            {{ method_field('DELETE') }}
            
            <button class="btn btn-dark" type="submit" data-toggle="tooltip" data-placement="left" title="Borrar" onclick="return confirm('¿Borrar?')">
                <i class="far fa-trash-alt"></i>
                 
            </form>
					

			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="text-center" style="padding-left: 200px;">
	{{ $bovinos->links() }}
</div>
</div>
@endsection
