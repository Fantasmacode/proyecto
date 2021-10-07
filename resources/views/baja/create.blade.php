@extends('capataz')

@section('form')

<div class="container">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Registrar Baja</h6>
	    </div>
	    <div class="card-body">

			@if (count($errors)>0)
			<div class="invalid-feedback" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<form action="{{ url('baja') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				@include('baja.form',['Modo'=>'crear'])

			</form>
		</div>
	</div>
</div>
@endsection