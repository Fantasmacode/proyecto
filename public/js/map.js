function iniciarMap() {
    //AQUI CAMBIAR LAS COORDENADAS PRINCIPALES A LAS QUE SE NECESITEN
    var myLatLng = { lat: 1.631147 ,lng: -78.731129 };

    var locations = [
    ['Title A', 3.180967, 101.715546, 1],
    ['Title B', 3.200848, 101.616669, 2],
    ['Title C', 3.147372, 101.597443, 3],
    ['Title D', 3.19125, 101.710052, 4]
    ];
    console.log(locations)

    var infowindow = new google.maps.InfoWindow;

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: myLatLng,
    });

    var marker, i;


    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
           map,
           position: new google.maps.LatLng(locations[i][1], locations[i][2]),
           animation: google.maps.Animation.DROP,
           title: locations[i][0],
       });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
           return function() {
               infowindow.setContent(locations[i][0]);
               infowindow.open(map, marker);
           }
       })(marker, i));
    }
}