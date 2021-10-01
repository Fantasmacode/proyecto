
<div class="form-group">
	<label for="lote">Lote</label>
	<select class="form-control {{ $errors-> has('id_lote')?'is-invalid':''}}" name="id_lote" id="lote" aria-label="Default select example">
		<option value="" selected>Seleccione lote</option>
		@foreach ($lotes as $lote)
		<option value="{{$lote->id_lote}}">{{$lote->nombre_lote}}</option>
		@endforeach
	</select>

	{!! $errors->first('id_lote' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label class="control-label" for="latitud">Latitud</label>
	<input type="text" class="form-control {{ $errors-> has('latitud_sectorizacion')?'is-invalid':''	}}" name="latitud_sectorizacion" id="latitud" value="{{ isset ($admin->latitud_sectorizacion)?$admin->latitud_sectorizacion: old('latitud_sectorizacion') }}">
	{!! $errors->first('latitud_sectorizacion' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
	<label class="control-label" for="longitud">Longitud</label>
	<input type="text" class="form-control {{ $errors-> has('longitud_sectorizacion')?'is-invalid':''	}}" name="longitud_sectorizacion" id="longitud" value="{{ isset ($admin->longitud_sectorizacion)?$admin->longitud_sectorizacion:	old('longitud_sectorizacion') }}">
	{!! $errors->first('longitud_sectorizacion' , '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="alert alert-primary" role="alert">
	Por favor arrastre el marcador a la posición que desee
</div>

<div class="form-group vh-50">
	<div id="map" class="vh-50"></div>
</div>

<button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>

<a class="btn btn-secondary" href="{{ url('sectorizacion/') }}"><i class="fas fa-arrow-alt-circle-left"></i></a>
<link rel="stylesheet" href="{{asset('css/map.css')}}">
<script src="{{ asset('js/mapSectorizacion.js') }}">
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABQkMieduqqbNZOPR6InyyARBrXselMMs&callback=initMapSectorizacion" async></script>