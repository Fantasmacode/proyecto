@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/sectorizacion/'.$admin->id_sectorizacion) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('sectorizacion.form-edit',['Modo'=>'editar'])

</form>
</div>
@endsection
