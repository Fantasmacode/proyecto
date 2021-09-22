@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/proveedor/'.$admin->idproveedor) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('proveedor.form',['Modo'=>'editar'])

</form>
</div>
@endsection
