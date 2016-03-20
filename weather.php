<html>
	<head>
        <script src="js/jquery.js"></script>
		<script src="js/jquery.simpleWeather.js"></script>
		<script>
		$(document).ready(function() {
        getWeather();
        setInterval(getWeather, 600000);
    });

    function getWeather() {
        var weather = 'http://api.openweathermap.org/data/2.5/weather?zip=08724,us&units=imperial&appid=6d3cc3a632aaa6c93edd758ea9f36de9';
    $.ajax({
      data: {
      format: 'json'
      },
      dataType: "jsonp",
      url: weather,
      success: function(data)
      {
        html = '<h2>' + Math.round(data.main.temp) + '&deg;F </h2>';
        html += '<ul><li> Brick, NJ</li></ul><ul><li>' + data.weather[0].description + '</li><li>High:' + Math.round(data.main.temp_max) + '&deg;F</li><li>Low:' + Math.round(data.main.temp_min) + '&deg;F</li></ul>';
      
        $("#weather").html(html);
        getForecast();
      }
    });
    
    }
    function getForecast()
    {
        var forecastURL = 'http://api.openweathermap.org/data/2.5/forecast/daily?zip=08724,us&units=imperial&appid=6d3cc3a632aaa6c93edd758ea9f36de9'
        //var forecast += '<li>Tomorrow\'s forecast: <br/>' + weather.forecast[1].code + '&deg;' + weather.units.temp + '<br/>' + weather.forecast[1].text + '</li></ul>';  
         $.ajax({
      data: {
      format: 'json'
      },
      dataType: "jsonp",
      url: forecastURL,
      success: function(data)
      {
        var forecast = $("#weather").html() + '<li>Tomorrow\'s forecast:</br>' + data.list[1].weather[0].description + ' ' + Math.round(data.list[1].temp.day) + '&deg;F';

        $("#weather").html(forecast);
      }

    });
     }


    </script>
	<div id="weather-panel">
		<div id="weather"></div>
	</div>

	</head>

</html>