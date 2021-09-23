@extends('home')

@section('form')
<div class="container">

<form method="post" action="{{ route('administrador.update', $admin->id_usuario) }}" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}
@include ('administrador.form-edit', ['Modo'=>'editar'])

</form>
</div>
@endsection