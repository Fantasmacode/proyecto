@extends('home')

@section('form')

<div class="container">
<form method="post" action="{{ url('/usuarios/'.$updateimage->id) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('usuarios.form',['Modo'=>'editar'])

</form>
</div>
@endsection
