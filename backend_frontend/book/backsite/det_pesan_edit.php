<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['submitUser'])) {
	$no_det_pesan = $_POST['no_det_pesan'];
	$no_pesan = $_POST['no_pesan'];
	$kd_buku = $_POST['kd_buku'];
	$total_pesan = $_POST['total_pesan'];

	$sql = " update det_pesan set no_pesan='$no_pesan' , 
	kd_buku='$kd_buku', total_pesan='$total_pesan' 
	where no_det_pesan='$no_det_pesan'";

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