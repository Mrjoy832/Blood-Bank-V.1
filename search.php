


<!DOCTYPE html>
<html>
<head>
	<title>Nearest Hospitals</title>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnptiv07O-LzdEkNjkYgg5gF32oLo0HKE&libraries=places"></script>
	<script>
		// to open popup when i click on hospital
		function openPopup(event) {
  event.preventDefault(); // Prevents the link from opening in a new page
  window.open(event.target.href, "popup", "width=600,height=400"); // Opens the store_hospital.php page in a popup window
}

	  </script>
	<script>
		var map, service;
var infowindow;
var currentLocation;

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 0, lng: 0},
		zoom: 15
	});

	infowindow = new google.maps.InfoWindow();
	service = new google.maps.places.PlacesService(map);

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			currentLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			map.setCenter(currentLocation);
		}, function() {
			handleLocationError(true, infowindow, map.getCenter());
		});
	} else {
		handleLocationError(false, infowindow, map.getCenter());
	}

	//
	directionsService = new google.maps.DirectionsService();
directionsDisplay = new google.maps.DirectionsRenderer();
directionsDisplay.setMap(map);

}

function searchHospitals() {
			var searchInput = document.getElementById('search-input').value;

			if (searchInput) {
				var geocoder = new google.maps.Geocoder();
				geocoder.geocode({'address': searchInput}, function(results, status) {
					if (status === 'OK') {
						currentLocation = results[0].geometry.location;

						map.setCenter(currentLocation);

						var request = {
							location: currentLocation,
							radius: 5000,
							type: ['hospital'],
						};

						service.nearbySearch(request, function(results, status) {
							if (status === google.maps.places.PlacesServiceStatus.OK) {
								var list = document.getElementById('results');
								list.innerHTML = ''; // clear the previous search results
								for (var i = 0; i < results.length && i < 10; i++) {
    createMarker(results[i]);
    var item = document.createElement('li');
    // item.innerHTML = '<a href="#" style="text-decoration:none; color:#0000FF;" onclick="showDirections(' + i + ')" >' + results[i].name + '</a>';


	//when i click on any hospital it has feature to store name & address and open the php file as popup using openPopup()
    item.innerHTML = '<a href="#" onclick="showPopup(event, \'' + encodeURIComponent(results[i].name) + '\', \'' + encodeURIComponent(results[i].vicinity) + '\')" style="text-decoration:none; color:#0000FF;">' + results[i].name + '</a>';
	


    // // Add "ADD" button
    // var addButton = document.createElement('button');
    // addButton.innerHTML = 'ADD';
    // addButton.addEventListener('click', function() {
    //     addToMyList(this.parentNode.firstChild.textContent);
    // });
    // item.appendChild(addButton);

    // Add "REMOVE" button
    // var removeButton = document.createElement('button');
    // removeButton.innerHTML = 'REMOVE';
    // removeButton.addEventListener('click', function() {
    //     removeFromMyList(this.parentNode.firstChild.textContent);
    // });
    // item.appendChild(removeButton);
    
    // Add "DIRECTION" button
//     var directionButton = document.createElement('button');
//     directionButton.innerHTML = 'DIRECTION';
//     directionButton.addEventListener('click', function() {
//         var origin = currentLocation;
//         var destination = results[i].geometry.location;
//         var request = {
//             origin: origin,
//             destination: destination,
//             travelMode: 'DRIVING'
//         };
//         directionsService.route(request, function(response, status) {
//     if (status == 'OK') {
//         directionsDisplay.setDirections(response);
//         var time = response.routes[0].legs[0].duration.text;
//         var info = document.createElement('span');
//         info.innerHTML = ' (' + time + ')';
//         item.appendChild(info);
//     }
// });

//     });
//     item.appendChild(directionButton);

    list.appendChild(item);
}

							}
						});
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
	}
}


function createMarker(place) {
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
    });

    var contentString = '<div>' + place.name + '</div><button id="directions-button">Directions</button>';

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString);
        infowindow.open(map, this);
    });

    google.maps.event.addListener(infowindow, 'domready', function() {
        var directionsButton = document.getElementById('directions-button');
        directionsButton.addEventListener('click', function() {
            var directionsService = new google.maps.DirectionsService();
            var directionsDisplay = new google.maps.DirectionsRenderer();

            var start = currentLocation;
            var end = place.geometry.location;
            var request = {
                origin: start,
                destination: end,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    directionsDisplay.setDirections(result);
                    directionsDisplay.setMap(map);
                }
            });
        });
    });

	//
	
}


function handleLocationError(browserHasGeolocation, infowindow, currentLocation) {
	infowindow.setPosition(currentLocation);
	infowindow.setContent(browserHasGeolocation ?
		'Error: The Geolocation service failed.' :
		'Error: Your browser doesn\'t support geolocation.');
	infowindow.open(map);
}







function showPopup(event, name, address) {
	if (<?php echo (1); ?>) {
		event.preventDefault();
		var popup = document.createElement("div");
		popup.style.position = "fixed";
		popup.style.top = "50%";
		popup.style.left = "50%";
		popup.style.transform = "translate(-50%, -50%)";
		popup.style.backgroundColor = "#fff";
		popup.style.border = "2px solid #000";
		popup.style.padding = "10px";
		popup.style.zIndex = "9999";
		popup.style.width = "550px";
		popup.style.height = "450px";
        popup.innerHTML = '<iframe src="store_hospital.php?hospital=' + name + '&address=' + address + '" style="border: none; width: 100%; height: 100%;"></iframe><button style="position:absolute; bottom:0; right:0; background-color: #ff0000; color: #fff; width: 80px; height: 40px; font-size: 16px; border: none; border-radius: 5px; margin: 10px;" onclick="document.body.removeChild(this.parentNode)">Close</button>';
		document.body.appendChild(popup);
	} 

	else{
		alert("Sorry :) The hospital you choose is not in our service model \n Please choose another one.");
	}
    
} 






	</script>
	<style>
		#map {
			height: 500px;
			width: 60%;
			float: right;
  			
		}

		#results {
			height: 500px;
			width: 40%;
			float: left;
			padding: 0;
			margin: 0;
			list-style-type: none;
			overflow-y: scroll;
		}

		li {
			padding: 5px;
			border-bottom: 1px solid #ddd;
		}

		li:last-child {
			border-bottom: none;
		}

		/*  */
		
	</style>
</head>
<body onload="initMap()">
    <div id="search-container">
        <label for="search-input">Search for Nearest Hospitals:</label>
        <input type="text" id="search-input">
        <button onclick="searchHospitals()">Search</button>
    </div>
    
	<ul id="results"></ul>
	<div id="map"></div>
    
</body>
</html>


