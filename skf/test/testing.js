(function($){
	console.log('test JS loading....');

	function initMap() {
		const map = new google.maps.Map({
			zoom: 8,
			center: { lat: -34.397, lng: 150.644 },
		});
		const geocoder = new google.maps.Geocoder();
		geocodeAddress(geocoder, map);
	}
	initMap();
	function geocodeAddress(geocoder, resultsMap) {
		const address = 'Sydney, NSW';
		geocoder.geocode({ address: address }, (results, status) => {
			console.log(results);
			if (status === "OK") {
			  	resultsMap.setCenter(results[0].geometry.location);
			  	new google.maps.Marker({
			    	map: resultsMap,
			    	position: results[0].geometry.location,
			  	});
			} else {
			  alert("Geocode was not successful for the following reason: " + status);
			}
		});
	}
	exit;
	// we assume that you have an array of markers
	var markers = [];
	var geocode_api_base_url = "https://maps.googleapis.com/maps/api/geocode/json?";
	var params = {
	    adress : 05673,
	    components : "country:us",
	    sensor : false
	}
	// This is the result set of markers in area
	var in_area = [];
	//  http://maps.googleapis.com/maps/api/geocode/json?address=05673&components=country:US&sensor=false
	jQuery.getJSON( geocode_api_base_url + jQuery.param(params), function(data) {
	    var location, search_area, in_area = [];
	    console.log(data);
	    location = data['results'][0]['address_components']['geometry']['location'];
	    // We create a circle to look within:
	    search_area = {
	        strokeColor: '#FF0000',
	        strokeOpacity: 0.8,
	        strokeWeight: 2,
	        center : new google.maps.LatLng(location.lat, location.lon),
	        radius : 500
	    }
	    search_area = new google.maps.Circle(search_area);
	    jQuery.each(markers, function(i,marker) {
	       if (google.maps.geometry.poly.containsLocation(marker.getPosition(), search_area)) {
	         in_area.push(marker);
	       }
	    });
	    console.info(in_area);
	});
})(jQuery);
