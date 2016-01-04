<html>
	<head>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
		<script src="js/getLocation.js"></script>

	</head>
<div id="geoLocation">
	<div id="map" height="500" width="400"></div>
	<input type="hidden" id="geoLocationLatitude"/>
	<input type="hidden" id="geoLocationLongitude"/>
    <input id="duration" type="hidden" style="width:35em">
    <div id="instructions"></div>

</div>
	<script type="text/javascript">

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
		}
				function callback(response, status) {
					duration = document.getElementById("duration");

					if(status=="OK") {
						duration.value = response.rows[0].elements[0].duration.text;
					} else {
						alert("Error: " + status);
					}


					if(response.rows[0].elements[0].duration.value / 60 < 70)
					{	$("#instructions").html("There is currently very little traffic on the way to Newark.<br/>Your estimated travel time is : <br/>" +String.fromCharCode(13) + $("#duration").val()); }
					else if (response.rows[0].elements[0].duration.value / 60 >= 70 && response.rows[0].elements[0].duration.value / 60 < 100)
					{	$("#instructions").html("There is currently some traffic on the way to Newark.<br/>Your estimated travel time is : <br/>" +String.fromCharCode(13) + $("#duration").val());		}
					else
					{	$("#instructions").html("There is currently a ton of traffic on the way to Newark.<br/>You should just work from home.<br/>Your estimated travel time is : <br/>" +String.fromCharCode(13) + $("#duration").val());}
				}
	
				$(document).ready(function()
				{
					
				  getLocation();
				});	
		</script>

</html>