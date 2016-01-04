	function calculate()
	{
		
		var origin = new google.maps.LatLng($("#geoLocationLatitude").val(), $("#geoLocationLongitude").val()),
		destination = "751 Broad Street Newark, NJ 07102",
		service = new google.maps.DistanceMatrixService();

		service.getDistanceMatrix(
		{
			origins: [origin],
			destinations: [destination],
			travelMode: google.maps.TravelMode.DRIVING,
			avoidHighways: false,
			avoidTolls: false
		}, 
		callback
		);

		function callback(response, status) {
			duration = document.getElementById("duration");

			if(status=="OK") {
				duration.value = response.rows[0].elements[0].duration.text;
			} else {
				alert("Error: " + status);
			}
			$("#geoLocation").text("Your current estimated travel time to work is: " + $("#duration").val());
		}
}