@extends('capataz')

@section('form')

<div class="container-fluid">
    
</div>

<div class="container">


<br>
<br>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Raza</th>
            <th>Estado</th>
        </tr>       
    </thead>
    <tbody>
       @foreach (DB::table('bovino')->get() as $bovino)
        <tr>
            <td>{{ $bovino->id_bovino }}</td>
            <td>{{ $bovino->id_raz }}</td>
            <td>{{ $bovino->id_estadob }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">

</div>
</div>
@endsection
