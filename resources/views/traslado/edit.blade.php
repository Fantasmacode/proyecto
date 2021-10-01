@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/traslado/'.$admin->id_traslado) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('traslado.form-edit',['Modo'=>'editar'])

</form>
</div>
@endsection
