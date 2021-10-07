@extends('capataz')

@section('form')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de Lotes</h6>
    </div>
    <div class="card-body">
        <form action="{{ url('mostrarestadolote') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
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

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Área</th>
                        <th>Extension</th>
                        <th>Nombre de Lote  </th>
                        <th>Estado</th>
                        <th>Cantidad de Bovinos</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Área</th>
                        <th>Extension</th>
                        <th>Nombre de Lote  </th>
                        <th>Estado</th>
                        <th>Cantidad de Bovinos</th>
                    </tr>
                </tfoot>
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
        </div>
    </div>
</div>
@endsection
