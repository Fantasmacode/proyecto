@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/ubicacion/'.$admin->idubicacion) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('ubicacion.form',['Modo'=>'editar'])

</form>
</div>
@endsection
