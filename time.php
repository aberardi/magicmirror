<html>
	<head>
		<script src="js/moment.js"></script>
		<script type="text/javascript">
			var day = null;
			$(document).ready(function()
			{
			  updateTime();
			  setInterval(updateTime, 1000);
			});


			function updateTime()
			{
				var NowMoment = moment();
			  	var eTime = document.getElementById('timestamp');
				eTime.innerHTML = NowMoment.format('hh:mm:ss A');
				updateDate();
			}

			function updateDate()
			{
				var NowMoment = moment();
				var eDate = document.getElementById('date');
				eDate.innerHTML = NowMoment.format('MM/DD/YYYY');
				document.getElementById('datecheck').value = NowMoment;
			}
 		</script>

		<body>
			<input type="hidden" id="datecheck" name="datecheck" value=""> 
			<div id="time">
				<div id="timestamp"></div>
				<div id="date"></div>
			<div>
		</body>


</html>