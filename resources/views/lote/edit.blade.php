@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/lote/'.$admin->idlote) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('lote.form-edit',['Modo'=>'editar'])

</form>
</div>
@endsection
