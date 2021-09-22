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
       @foreach (DB::table('bovinos')->get() as $bovino)
        <tr>
            <td>{{ $bovino->idbovino }}</td>
            <td>{{ $bovino->raza }}</td>
            <td>{{ $bovino->estado }}</td>
                     
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">

</div>
</div>
@endsection
