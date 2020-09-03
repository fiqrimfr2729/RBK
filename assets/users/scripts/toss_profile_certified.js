//Start GMAP
function initMap() {

  var myLatLng = {lat: -4.402969, lng: 122.380632};

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


  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map
  });

}
//end of GMAP

jQuery(document).ready(function() {
  $('.datedropper').dateDropper();

  google.maps.event.addDomListener(window, 'load', initMap);
});

