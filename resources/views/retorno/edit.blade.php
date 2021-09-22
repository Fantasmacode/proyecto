@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/retorno/'.$admin->idretorno) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('retorno.form',['Modo'=>'editar'])

</form>
</div>
@endsection
