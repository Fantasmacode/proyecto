@extends('home')

@section('form')
<div class="container">

<form method="post" action="{{ url('/administrador/'.$admin->id) }}" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}
@include ('administrador.form-edit', ['Modo'=>'editar'])

</form>
</div>
@endsection