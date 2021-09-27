@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/comercio/'.$admin->id_comercio) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('comercio.form-edit',['Modo'=>'editar'])

</form>
</div>
@endsection
