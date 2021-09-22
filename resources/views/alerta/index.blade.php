@extends('capataz')

@section('form')

<div class="container-fluid">
	
</div>

<div class="container">
@if(Session::has('Mensaje'))
<div class="alert alert-succes" role="alert">
	{{  Session::get('Mensaje') }}	
</div>

@endif


<div class="text-center" style="padding-left: 250px;">
	{{ $alertas->links() }}
</div>
</div>
@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	Swal.fire({
  title: 'REPORTE DE ALERTA!',
  text: "!!!ALERTA!!!  El ganado identificado con el numero()sobrepaso los limites del lote",
  icon: 'warning',
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Desactivar'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Desactivada',
      
    )
  }
})
</script>
@endsection
