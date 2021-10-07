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
		<div class="btn btn-danger">
			Alertas <span class="badge bg-secondary">{{ $total }}</span>
		</div>
		@foreach ($alertas as $alerta)
			<div class="alert alert-danger" role="alert">
				<div class="row">
					<div class="col-md-6">
						<strong>Mensaje:</strong> {{ $alerta->mensaje_alerta }}
					</div>
					<div class="col-md-6">
						<strong>Fecha y Hora:</strong> {{ $alerta->fecha_alerta }} - {{ $alerta->hora_alerta }}
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<strong>Bovino:</strong> {{ $alerta->bovino->id_bovino }} <br>
						<strong>Raza:</strong> {{ $alerta->bovino->lote->nombre_lote }}
					</div>
					<div class="col-md-6">
						<strong>Coordenadas:</strong> <br>
						<strong>Latitud:</strong> {{ $alerta->bovino->ubicacion->latitud_ubicacion }}
						<strong>Longitud:</strong> {{ $alerta->bovino->ubicacion->longitud_ubicacion }}
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<link rel="stylesheet" href="{{asset('css/map.css')}}">
    <script src="{{ asset('dash/vendor/jquery/jquery.min.js') }}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABQkMieduqqbNZOPR6InyyARBrXselMMs"></script>
	<script>
		let markers = [];
		function iniciarMap(coordenadas) {
			var myLatLng;
			if (coordenadas.length > 0) {
				myLatLng = { lat: coordenadas[0][1] ,lng: coordenadas[0][2] };
			} else {
				myLatLng = { lat: 1.631147 ,lng: -78.731129 };
			}

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

				markers.push(marker);

				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent("<span class='text-lg'><strong>Bovino: </strong>"+locations[i][3]+" <strong>Raza: "+locations[i][0]+"</strong></span>");
						infowindow.open(map, marker);
					}
				})(marker, i));
			}
		}

		function setMapOnAll(map) {
			for (let i = 0; i < markers.length; i++) {
				markers[i].setMap(map);
			}
		}

		function hideMarkers() {
			setMapOnAll(null);
		}

		function deleteMarkers() {
			hideMarkers();
			markers = [];
		}

		function ubicaciones(){
			$.ajax({
	            url: 'ubicaciones/coordenadas',
	            type: "GET",
	            success: function(data){
	               	deleteMarkers()
					iniciarMap(data.coordenadas)
	            },
	            error: function (e){
	                setTimeout(function(){
	                    alert("error");
	                }, 500);
	            },
	        });
		}
		ubicaciones()
		setInterval(ubicaciones, 60000);
	</script>
</body>
</html>
@endsection