<html>
	<head>
		<script src="js/jquery.simpleWeather.js"></script>
		<script>
		$(document).ready(function() {
        getWeather();
        setInterval(getWeather, 1800);
    });

    function getWeather() {

        navigator.geolocation.getCurrentPosition(function(position) {

            var location = (position.coords.latitude + ',' + position.coords.longitude);
            var woeid = '';

            $.simpleWeather({
                location: location,
                woeid: woeid,
                unit: 'f',
                success: function(weather) {
                    html = '<h2>' + weather.temp + '&deg;' + weather.units.temp + '</h2>';
                    html += '<ul><li>' + weather.city + ', ' + weather.region + '</li>';
                    html += '<li class="currently">' + weather.currently + '</li></ul>';
                    html += '<li>Tomorrow\'s forecast: <br/>' + weather.forecast[1].code + '&deg;' + weather.units.temp + '<br/>' + weather.forecast[1].text + '</li></ul>';

                    $("#weather").html(html);
                },
                error: function(error) {
                    $("#weather").html('<p>' + error + '</p>');
                }
            });
        });
    }
    </script>
	<div id="weather-panel">
		<div id="weather"></div>
	</div>

	</head>

</html>