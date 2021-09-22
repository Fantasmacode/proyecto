@extends('capataz')

@section('form')

<!DOCTYPE html>
<html>
<head>
	<title>Maps</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/map.css')}}">
</head>
<body>
	<div id="map"></div>
<script src="{{asset('js/map.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
</body>
</html>
@endsection