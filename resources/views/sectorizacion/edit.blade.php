@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/sectorizacion/'.$admin->idsectorizacion) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('sectorizacion.form',['Modo'=>'editar'])

</form>
</div>
@endsection
