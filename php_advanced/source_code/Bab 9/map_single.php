<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
		html, body { height: 100%; margin: 0; padding: 0; }
		#map { height: 100%; }
		</style>
	</head>
	<body>
		<div id="map"></div>
		
		<script type="text/javascript">
		var map;
		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: -6.713356, lng: 108.550512},
				zoom: 16
			});
			
			 var image = [
			 	['http://asfasolution.co.id/images/asfa_logo.png'],
			 	['http://agussaputra.com/images/favicon.png'],
			 	['http://oaseast.com/assets/images/demo/favicon.ico']
			 ];

			var markers = [
				['Kantor Pusat CV. ASFA Solution', -6.713356 , 108.550512],
				['Kantor Cabang CV. ASFA Solution', -6.713568, 108.548346],
				['Gudang CV. ASFA Solution', -6.713003, 108.559783]
			];
			
			var infowindow = new google.maps.InfoWindow(), marker, i; // kita buat beberapa variabel untuk keperluan looping.
			
			for (i = 0; i < markers.length; i++) {  // loop sebanyak size dari array
				pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
				marker = new google.maps.Marker({
					position: pos,
					map: map,
					icon: image[i][0]
				});
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent(markers[i][0]);
						infowindow.open(map, marker);
					}
				})(marker, i));
			}
			
			// Menambahkan marker (penanda) ke dalam peta
			//var marker = new google.maps.Marker({
			//	position: new google.maps.LatLng(-6.713356, 108.550512),
			//	map: map,
			//	title: 'Klik Saya'
			//});
			
			// Membuat InfoWindow dengan memunculkan informasi tambahan ketika di-klik
			//var infowindow = new google.maps.InfoWindow({
			//	content: 'CV. ASFA Solution'
			//});
			
			// Menambahkan event Click pada penanda
			//google.maps.event.addListener(marker, 'click', function() {
				// Memanggil 'open method' InfoWindow
			//	infowindow.open(map, marker);
			//});
		}
		</script> 
		
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=KEY_ANDA&callback=initMap"></script>
	</body>
</html>