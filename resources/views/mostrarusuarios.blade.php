@extends('user')

@section('form')

<div class="container">

<br>
<br>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
           <th>Nombre</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Rol</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach (DB::table('users')->get() as $user)
        <tr>
            <td>{{ $user->nombre }}</td>
            <td>{{ $user->documento }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->telefono }}</td>
            <td>{{ $user->rol }}</td>
           
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">
</div>
</div>
@endsection
