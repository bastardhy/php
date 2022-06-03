<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['tambahLogin'])) {
	$no_det_pesan = $_POST['no_det_pesan'];
	$no_pesan = $_POST['no_pesan'];
	$kd_buku = $_POST['kd_buku'];
	$total_pesan = $_POST['total_pesan'];

	$sql = "INSERT INTO det_pesan(no_det_pesan,no_pesan,kd_buku,total_pesan)
		VALUES('$no_det_pesan', '$no_pesan', '$kd_buku','$total_pesan')";
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=det_pesan_view&status=0');
	} else {
		header('location:index.php?page=det_pesan_view&status=1');
	}
	mysql_close();
}
?>
