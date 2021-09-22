@extends('capataz')

@section('form')

<div class="container">
<form method="post" action="{{ url('/estado/'.$admin->idestado) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('estado.form',['Modo'=>'editar'])

</form>
</div>
@endsection
