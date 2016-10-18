$(document).ready(function(){
	
	var geocoder;
	var map;
	
	function initialize() {
	  geocoder = new google.maps.Geocoder();
	
	  var mapOptions = {
		center: new google.maps.LatLng(42.35137, -71.067),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		zoom: 16,
	    scrollwheel: false,
	    navigationControl: false,
	    mapTypeControl: false,
	    scaleControl: false,
	    draggable: false,
	 	disableDefaultUI: true,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  }
	  
	  map = new google.maps.Map(document.getElementById('map'), mapOptions);
	  
	  codeAddress();
	}
	
	function codeAddress() {
	  var address = $('#address').html();
	  
	  geocoder.geocode( { 'address': address}, function(results, status) {
	    if (status == google.maps.GeocoderStatus.OK) {
	      
	      var marker = new google.maps.Marker({
	          map: map,
	          position: results[0].geometry.location
	      });
	      
	    } else {
	      alert('Geocode was not successful for the following reason: ' + status);
	    }
	  });
	}
	
	initialize();
});