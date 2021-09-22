@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/estadolote/'.$admin->idestadolote) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('estadolote.form-edit',['Modo'=>'editar'])

</form>
</div>
@endsection
