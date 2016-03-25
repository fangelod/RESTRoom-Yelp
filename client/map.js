$(document).ready(function() {
	
	var union = new google.maps.LatLng(35.910376, -79.047708);  //center of the map
	
	var markers=[]; //array to hold all the markers
	
	function initializeMap() {
		var mapProp = {
			center: union,
			zoom:16, 
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
		
	
		
		var unionMarker = new google.maps.Marker({
			position: union,
			//icon: 'toilet.jpeg',
			draggable: true,
			animation: google.maps.Animation.DROP
		});
		markers.push(unionMarker);
		
		var sittersonMarker = new google.maps.Marker({
			position: new google.maps.LatLng(35.910186, -79.053211),
			draggable: true,
			animation: google.maps.Animation.DROP
		});
		markers.push(sittersonMarker);
		
		var davisMarker = new google.maps.Marker({
			position: new google.maps.LatLng(35.911104, -79.047937),
			draggable: true,
			animation: google.maps.Animation.DROP
		});
		markers.push(davisMarker);
		
		var ulMarker = new google.maps.Marker({
			position: new google.maps.LatLng(35.909958, -79.048878),
			draggable: true,
			animation: google.maps.Animation.DROP
		});
		markers.push(ulMarker);
		
		var phillipsMarker = new google.maps.Marker({
			position: new google.maps.LatLng(35.910990, -79.052424),
			draggable: true,
			animation: google.maps.Animation.DROP
		});
		markers.push(phillipsMarker);
		
			
		var greenLawMarker = new google.maps.Marker({
			position: new google.maps.LatLng(35.910566, -79.049248),
			draggable: true,
			animation: google.maps.Animation.DROP
		});
		markers.push(greenLawMarker);
		
		var wilsonMarker = new google.maps.Marker({
			position: new google.maps.LatLng(35.909716, -79.049781),
			draggable: true,
			animation: google.maps.Animation.DROP
		});
		markers.push(greenLawMarker);
		
		var lenoirMarker = new google.maps.Marker({
			position: new google.maps.LatLng(35.910707, -79.048724),
			draggable: true,
			animation: google.maps.Animation.DROP
		});
		markers.push(lenoirMarker);
		
		
		for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}
		markers.addListener('click', toggleBounce);
		
		//Zoom to 9 when clicking on a marker
		google.maps.event.addListener(unionMarker, 'click', function() {
			map.setZoom(9);
			map.setCenter(unionMarker.getPosition());
		});
	}
	
	
	
	
	
	//Did not use
	function toggleBounce() {
		for (var i = 0; i < markers.length; i++) {
			if (markers[i].getAnimation() !== null) {
				markers[i].setAnimation(null);
			}
		 else {
				markers[i].setAnimation(google.maps.Animation.BOUNCE);
			}
		}
	}
	
	
	google.maps.event.addDomListener(window, 'load', initializeMap);
	
	//Did NOT USE
	for (var i = 0; i < markers.length; i++) {
			google.maps.event.addListener(markers[i], 'click', function() {
				map.setZoom(9);
				map.setCenter(markers[i].getPosition());
			});
		}
});