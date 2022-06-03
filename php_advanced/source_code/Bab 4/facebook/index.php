<?php 
$connect = mysqli_connect("localhost","root","","dbphpgila"); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Pagination ala Facebook</title>
	
	<link href="style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="jquery-migrate.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			//jika showmore post diklik
			$('.load_more').live("click",function() {
				//buat variabel id_terakhir dari id milik load_more
				var id_terakhir = $(this).attr("id");
				//Jika id_terakhir tidak sama dengan end
				if(id_terakhir!='end'){//lakukan request ajax
					$.ajax({
						type: "POST",
						url: "tampil.php", //proses ke file php
						data: "idakhir="+ id_terakhir,
						beforeSend: function() {
							$('a.load_more').append('<img src="facebook_style_loader.gif" />');
						},
						success: function(html){
							$(".facebook_style").remove(); //hilangkan div dengan class name facebook style
							$("ol#updates").append(html); //memberikan respon ke ol#updates
						}
					});
				}
				
				return false;
			});
		});
	</script>
</head>
<body>
	<div id='container'>
		<ol class="row" id="updates">
			
			<?php
			//tampilkan status dengan limit 2
			$query ="SELECT * FROM as_members ORDER BY id_member LIMIT 2";
			$sql = mysqli_query($connect, $query);
			while($data = mysqli_fetch_array($sql)){
				$id = $data['id_member'];
				$nama =$data['nama_lengkap'];
				
				echo "<li> $nama </li>";
			}
			?>
		</ol>
		
		<div class="facebook_style" id="facebook_style">
			<a id="<?php echo $id; ?>" href="#" class="load_more" >Load More <img src="arrow1.png" /></a>
		</div>
	</div>
</body>
</html>