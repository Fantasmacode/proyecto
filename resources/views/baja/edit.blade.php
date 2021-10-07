@extends('capataz')

@section('form')

<div class="container">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Modificar Baja</h6>
	    </div>
	    <div class="card-body">
			<form method="post" action="{{ url('/baja/'.$admin->id_baja) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PATCH') }}

				@include('baja.form-edit',['Modo'=>'editar'])

			</form>
		</div>
	</div>
</div>
@endsection
