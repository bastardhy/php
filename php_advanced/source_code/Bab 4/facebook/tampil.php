<?php
$connect = mysqli_connect("localhost","root","","dbphpgila");

if(isset($_POST['idakhir']))
{
	$idakhir=$_POST['idakhir'];
	
	//tampilkan 5 status berikutnya
	$query = "SELECT * FROM as_members WHERE id_member > '$idakhir' ORDER BY id_member LIMIT 2";
	$sql = mysqli_query($connect, $query);
	
	while($data = mysqli_fetch_array($sql))
	{
		$id = $data['id_member'];
		$nama = $data['nama_lengkap'];
		
		echo "<li> $nama </li>";
	}

	if(mysqli_num_rows($sql)==2){ //statement if else ini akan memutuskan apakah data masih bisa ditampilkan lagi atau tidak
	?>
		<div class="facebook_style" id="facebook_style"> <a id="<?php echo $id; ?>" href="#" class="load_more" >Load More <img src="arrow1.png" /></a> </div>
	<?php
	}
	else {
		echo "<div id='facebook_style'>
		<a id='end' href='#' class='load_more' >No More Posts</a>
		</div>";
	}
}
?>