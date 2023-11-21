//Google Map
var map;

var map_lon = $(".map-canvas").attr("data-map-lon");  // Longitude
var map_lat = $(".map-canvas").attr("data-map-lat");  // Latitude

if(map_lon==undefined){map_lon = 40.707476}
if(map_lat==undefined){map_lat = -74.013670}

function initialize() {	

	// coordinate
	var myLatlng = new google.maps.LatLng(map_lon, map_lat);

	var mapOptions = {
		zoom: 8,
		draggable: false,
		disableDefaultUI: true,
		disableDoubleClickZoom: true,
		scrollwheel: false,
		center: myLatlng
	};

	var map = new google.maps.Map(document.getElementsByClassName('map-canvas')[0],mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

$(window).resize(initialize);