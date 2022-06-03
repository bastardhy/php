<?php
include ('backsite/inc/config.php');
//data dari user
if (isset($_POST['tambah'])) {
	
	$tanggal = $_POST['tanggal'];
	$kd_pesan = $_POST['kd_pesan'];
	$total_bayar = $_POST['total_bayar'];

	$sql = "INSERT INTO pembayaran(tanggal,kd_pesan,total_bayar,status)
		VALUES( '$tanggal', '$kd_pesan','$total_bayar','belum')";
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=bayar_form_add&status=0');
	} else {
		header('location:index.php?page=bayar_form_add&status=1');
	}
	mysql_close();
}
?>
