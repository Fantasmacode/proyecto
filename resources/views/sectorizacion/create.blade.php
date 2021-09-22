@extends('capataz')

@section('form')

<div class="container">

@if (count($errors)>0)
<div class="invalid-feedback" role="alert">
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<form action="{{ url('sectorizacion') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}
	@include('sectorizacion.form',['Modo'=>'crear'])
	
</form>

</div>
@endsection