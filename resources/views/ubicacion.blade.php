@extends('capataz')

@section('form')

<!DOCTYPE html>
<html>
<head>
	<title>Maps</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/map.css')}}">
</head>
<body>
	<div class="form-group vh-70">
		<div id="map" class="vh-70"></div>
	</div>
	<div class="form-group">
		@foreach ($alertas as $alerta)
			<div class="alert alert-danger" role="alert">
				{{ $alerta->mensaje_alerta }} <br>
				{{ $alerta->fecha_alerta }} <br>
				{{ $alerta->hora_alerta }} <br>
				{{ $alerta->bovino->id_bovino }} <br>
				{{ $alerta->bovino->lote->nombre_lote }} <br>
				<label for="">Latitud</label> <br>
				<span>{{ $alerta->bovino->ubicacion->latitud_ubicacion }}</span> <br>
				<label for="">Longitud</label> <br>
				<span>{{ $alerta->bovino->ubicacion->longitud_ubicacion }}</span> <br>
			</div>
		@endforeach
	</div>
	<link rel="stylesheet" href="{{asset('css/map.css')}}">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABQkMieduqqbNZOPR6InyyARBrXselMMs"></script>
	<script>
		var coordenadas = {!! json_encode($coordenadas, JSON_PRETTY_PRINT) !!};
		console.log(coordenadas)
		function iniciarMap() {
			var myLatLng = { lat: 1.631147 ,lng: -78.731129 };

			var locations = coordenadas;

			var infowindow = new google.maps.InfoWindow;

			const map = new google.maps.Map(document.getElementById("map"), {
				zoom: 14,
				center: myLatLng,
			});

			var marker, i;


			for (i = 0; i < locations.length; i++) {
				marker = new google.maps.Marker({
					map,
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					animation: google.maps.Animation.DROP,
				});

				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent("<span class='text-lg'>"+locations[i][3]+"</span>");
						infowindow.open(map, marker);
					}
				})(marker, i));
			}
		}
		iniciarMap()
	</script>
</body>
</html>
@endsection