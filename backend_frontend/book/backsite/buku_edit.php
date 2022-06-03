<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['submitUser'])) {
	$kd_buku = $_POST['kd_buku'];
	$kd_kategori = $_POST['kd_kategori'];
	

	//$kd_kategori=md5($kd_kategori);
	//	$ukuran=md5($ukuran);
	$sql = " update buku set kd_kategori='$kd_kategori' , ukuran='$ukuran' where kd_buku='$kd_buku'";

	//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=buku_view&status=0');
	} else {
		header('location:index.php?page=buku_view&status=1');
	}
	mysql_close();
}
?>