//Start GMAP
function initMap() {

    var marker = '';
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -4.402969, lng: 122.380632},
      zoom: 4,
      mapTypeId: 'roadmap',
      mapTypeControl: false,
      streetViewControl: false,
      zoomControl: false,
      // disableDoubleClickZoom: true,

      gestureHandling: 'greedy',
      // fullscreenControl: false,
      fullscreenControlOptions : {
        position: google.maps.ControlPosition.RIGHT_BOTTOM
      },
    });

    marker = new google.maps.Marker({
      map: map,
      draggable: true,
      position: {lat: -4.402969, lng: 122.380632}
    });

    // set lat lng to input text
    document.getElementById('latitude').value = '-4.402969';
    document.getElementById('longitude').value = '122.380632';

    //get client location and set map to view
    // if (navigator.geolocation) {
    //    navigator.geolocation.getCurrentPosition(function (position) {
    //        initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
    //        map.setCenter(initialLocation);
    //    });
    // }

    google.maps.event.addListener(marker, 'dragend', function (evt) {
      document.getElementById('latitude').value = evt.latLng.lat().toFixed(3);
      document.getElementById('longitude').value = evt.latLng.lng().toFixed(3);
    });

    google.maps.event.addListener(marker, 'dragstart', function (evt) {
      document.getElementById('latitude').value = evt.latLng.lat().toFixed(3);
      document.getElementById('longitude').value = evt.latLng.lng().toFixed(3);
    });

    google.maps.event.addListener(marker, 'idle', function (evt) {
      document.getElementById('latitude').value = evt.latLng.lat().toFixed(3);
      document.getElementById('longitude').value = evt.latLng.lng().toFixed(3);
    });
   
    var input = document.getElementById('pac-input');
   
    var autocomplete = new google.maps.places.Autocomplete(input);
    
    //set input text inside map
    // map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);

    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    autocomplete.bindTo('bounds', map);

    // Set the data fields to return when the user selects a place.
    autocomplete.setFields(
        ['address_components', 'geometry', 'icon', 'name']);

   
    

    autocomplete.addListener('place_changed', function() {
      
      // marker.setVisible(false);
      marker.setMap(null);
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // User entered the name of a Place that was not suggested and
        // pressed the Enter key, or the Place Details request failed.
        // window.alert("No details available for input: '" + place.name + "'");
        // set alert with style if place not found

        $.alert("No details available for input: '" + place.name + "'");

        return;
      }

      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);  // Why 17? Because it looks good.
      }
      // marker.setPosition(place.geometry.location);
      // marker.setVisible(true);

        marker = new google.maps.Marker({
          map: map,
          draggable: true,
          position: place.geometry.location
        });

        document.getElementById('latitude').value = place.geometry.location.lat().toFixed(3);
        document.getElementById('longitude').value = place.geometry.location.lng().toFixed(3);

      var address = '';
      if (place.address_components) {
        address = [
          (place.address_components[0] && place.address_components[0].short_name || ''),
          (place.address_components[1] && place.address_components[1].short_name || ''),
          (place.address_components[2] && place.address_components[2].short_name || '')
        ].join(' ');
      }

      
      google.maps.event.addListener(marker, 'dragend', function (evt) {
        document.getElementById('latitude').value = evt.latLng.lat().toFixed(3);
        document.getElementById('longitude').value = evt.latLng.lng().toFixed(3);
      });

      google.maps.event.addListener(marker, 'dragstart', function (evt) {
        document.getElementById('latitude').value = evt.latLng.lat().toFixed(3);
        document.getElementById('longitude').value = evt.latLng.lng().toFixed(3);
      });

      google.maps.event.addListener(marker, 'idle', function (evt) {
        document.getElementById('latitude').value = evt.latLng.lat().toFixed(3);
        document.getElementById('longitude').value = evt.latLng.lng().toFixed(3);
      });


    });

}
//end of GMAP

jQuery(document).ready(function() {
  $('.datedropper').dateDropper();

  google.maps.event.addDomListener(window, 'load', initMap);
});

