@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/motivotraslado/'.$admin->idmotivo) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('motivotraslado.form',['Modo'=>'editar'])

</form>
</div>
@endsection
