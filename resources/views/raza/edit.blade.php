@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/raza/'.$admin->id_raz) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('raza.form',['Modo'=>'editar'])

</form>
</div>
@endsection
