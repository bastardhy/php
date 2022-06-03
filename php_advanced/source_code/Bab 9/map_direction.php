<!DOCTYPE html>
<html>
<head>
	<title>MENAMPILKAN PETUNJUK ARAH</title>
	<meta charset="utf-8"/>
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=KEY_ANDA"></script>
		<script type="text/javascript">
			function init(){
				var service = new google.maps.DirectionsService;
				var view = new google.maps.DirectionsRenderer;
				
				var info_window = new google.maps.InfoWindow();
				var zoom = 5;
				
				var pos = new google.maps.LatLng(-3.050444,116.323242);
				var options = {
					'center': pos,
					'zoom': zoom,
					'mapTypeId': google.maps.MapTypeId.ROADMAP
				};
				
				var map = new google.maps.Map(document.getElementById('maps'), options);
				view.setMap(map);
				info_window = new google.maps.InfoWindow({
					'content': 'loading...'
				});
				
				var result = function(){
					lihat(service, view);
				}
				
				document.getElementById('lihat').addEventListener('click', result)
			}
			
			function lihat(service, view){
				var start = document.getElementById('start').value;
				var end = document.getElementById('end').value;
				
				var request = {
					origin: start,
					destination: end,
					travelMode: google.maps.TravelMode.DRIVING
				};
				
				service.route(request, function(response, status){
					if(status == google.maps.DirectionsStatus.OK){
						view.setDirections(response);
					}else{
						window.alert('Directions request failed due to ' + status);
					}
				});
			}
			
			google.maps.event.addDomListener(window, 'load', init);
		</script>
	</head>
	<body>
		<input type="text" id="start" size="50" placeholder="Lokasi sekarang">
		<input type="text" id="end" size="50" placeholder="Tujuan">
		<button id="lihat">lihat</button>
		<br><br>
		<div id="maps" style="width: 800px; height: 400px;"></div>
	</body>
</html>