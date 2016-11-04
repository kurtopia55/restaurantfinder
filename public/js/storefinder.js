// Note: This example requires that you consent to location sharing when
 // prompted by your browser. If you see the error "The Geolocation service
 // failed.", it means you probably did not give permission for the browser to
 // locate you.

 var nearbys = [],
       nearbyc;

var myLocation = {},
      directionsDisplay, 
      directionsService, 
      requestNode = document.querySelector("#requestNode")
      directionNode = document.querySelector("#directionNode");

document.querySelector("storefinder-directions").addEventListener('set-route-index', function(e){
    directionsDisplay.setRouteIndex(e.detail.index);
});

function calcRoute(nearby){
    nearby = (nearby == undefined && nearbyc != undefined) ? nearbyc : nearby;

    if(nearby != undefined){
        var request = {
            origin: myLocation.lat + ',' + myLocation.lng,
            destination: nearby.lat + ',' + nearby.lng, 
            travelMode: 'DRIVING', 
            drivingOptions: {
                departureTime: new Date(Date.now()),  
                trafficModel: 'optimistic'
            }, 
            provideRouteAlternatives: true
        };

        directionsService.route(request, function(result, status) {
            if (status == 'OK') {
                directionNode.routes = result.routes;
                directionsDisplay.setDirections(result);
                nearbyc = nearby;
            }
        });
    }
}

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 16
    });

    var infoWindow = new google.maps.InfoWindow({map: map});
   
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            myLocation = {'lat' : position.coords.latitude, 'lng': position.coords.longitude};
            var markerLocation  = new google.maps.Marker({
                position: myLocation, 
                map: map,
                draggable: true,
                title: "You're here!"
            });

            requestNode.params = myLocation;
            requestNode.generateRequest();

            requestNode.addEventListener('response', function(e){
                nearbys = e.detail.response;
                nearbys.forEach(function(nearby, idx){
                    var marker = new google.maps.Marker({
                        position: {'lat' : nearby.lat, 'lng': nearby.lng}, 
                        map: map,
                        title: nearby.name
                    });

                    marker.addListener('click', function(){
                        var content = "<div><div>Name: " + nearby.name + "</div><div style = 'margin-bottom:10px'>Address: " + nearby.address + "</div><a href= 'javascript:void(0)' drawer-toggle>Get Direction</a></div>";
                        infoWindow.setContent(content)
                        infoWindow.open(map, marker);
                        content = '';
                        calcRoute(nearby);
                    });
                });
            });

            infoWindow.setContent("You're here!")
            infoWindow.open(map, markerLocation);
            map.setCenter({'lat' : position.coords.latitude, 'lng': position.coords.longitude});

            markerLocation.addListener('click', function(){
                var content = "You're here!";
                infoWindow.setContent(content)
                infoWindow.open(map, markerLocation);
                content = '';
            });

            directionsService = new google.maps.DirectionsService()
            directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
            directionsDisplay.setMap(map);

            google.maps.event.addListener(markerLocation, 'dragend', function (event) {
                myLocation = {'lat' : event.latLng.lat(), 'lng': event.latLng.lng()};
                map.setCenter({'lat' : event.latLng.lat(), 'lng': event.latLng.lng()});

                calcRoute(undefined);

                requestNode.params = myLocation;
                requestNode.generateRequest();
            });

        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
infoWindow.setPosition(pos);
infoWindow.setContent(browserHasGeolocation ?  'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
}