@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/bovino/'.$admin->idbovino) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('bovino.form-edit',['Modo'=>'editar'])

</form>
</div>
@endsection
