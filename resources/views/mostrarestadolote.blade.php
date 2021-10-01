@extends('capataz')

@section('form')

<div class="container-fluid">
    
</div>

<div class="container">


<br>
<br>


<form action="{{ url('mostrarestadolote') }}" method="GET" class="mb-4">
    <div class="row">
        <div class="col">
            <select name="id_lote" id="input" class="form-control">
                <option value="">Todos</option>
                @foreach ($lotesselect as $lote)
                    <option value="{{ $lote->id_lote }}" {{ $lote->id_lote == $selected_id['id_lote'] ? 'selected' : '' }}>
                        {{ $lote->nombre_lote }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <input type="submit" class="btn btn-success btn-sm" value="Filtrar">
        </div>
    </div>
</form>

<table class="table table-dark">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Área</th>
            <th>Extension</th>
            <th>Nombre de Lote  </th>
            <th>Estado</th>
            <th>Cantidad de Bovinos</th>
            
            
        </tr>
    </thead>
    <tbody>
       @foreach ($lotes as $lote)
        <tr>
            <td>{{ $lote->id_lote }}</td>
            <td>{{ $lote->area_lote }}</td>
            <td>{{ $lote->extension_lote }}</td>
            <td>{{ $lote->nombre_lote }}</td>
            <td>{{ $lote->estado->nombre_estadol }}</td>
            <td>{{ $lote->bovinos_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center" style="padding-left: 250px;">

</div>
</div>
@endsection
