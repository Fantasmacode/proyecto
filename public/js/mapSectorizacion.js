function iniciarMap(){
    var coord = {lat:1.6308 ,lng: -78.7323};
    var map = new google.maps.Map(document.getElementById('map'),{
        zoom: 10,
        center: coord
    });
    var marker = new google.maps.Marker({
        position: coord,
        map: map
    });
}

function initMapSectorizacion() {
    var latitud = document.getElementById('latitud').value;
    var longitud = document.getElementById('longitud').value;
    //AQUI CAMBIAR LAS COORDENADAS PRINCIPALES A LAS QUE SE NECESITEN
    var myLatLng = { lat: 1.631147 ,lng: -78.731129 };
    if (latitud != '' && longitud != '') {
        myLatLng = { lat: parseFloat(latitud), lng: parseFloat(longitud) };
    }

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: myLatLng,
    });

    marker = new google.maps.Marker({
        map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: myLatLng,
        title: "Marcador del sector!",
    });

    google.maps.event.addListener(marker, 'dragend', function (evt) {
        document.getElementById('latitud').value = evt.latLng.lat().toFixed(6);
        latitud = evt.latLng.lat().toFixed(6);
        document.getElementById('longitud').value = evt.latLng.lng().toFixed(6);
        longitud = evt.latLng.lng().toFixed(6);
    });
}