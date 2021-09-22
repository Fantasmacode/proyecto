@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/alerta/'.$admin->idalerta) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('alerta.form',['Modo'=>'editar'])

</form>
</div>
@endsection
