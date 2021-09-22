@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/traslado/'.$admin->idtraslado) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('traslado.form',['Modo'=>'editar'])

</form>
</div>
@endsection
