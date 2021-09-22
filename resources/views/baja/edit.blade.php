@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/baja/'.$admin->idbaja) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('baja.form-edit',['Modo'=>'editar'])

</form>
</div>
@endsection
