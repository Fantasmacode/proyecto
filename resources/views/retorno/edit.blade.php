@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/retorno/'.$admin->id_traslado) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('retorno.form-edit',['Modo'=>'editar'])

</form>
</div>
@endsection
