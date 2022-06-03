<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['tambahLogin'])) {
	$no = $_POST['no'];
	$tanggal = $_POST['tanggal'];
	$kd_pesan = $_POST['kd_pesan'];
	$total_bayar = $_POST['total_bayar'];

	$sql = "INSERT INTO pembayaran(no,tanggal,kd_pesan,total_bayar)
		VALUES('$no', '$tanggal', '$kd_pesan','$total_bayar')";
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=bayar_view&status=0');
	} else {
		header('location:index.php?page=bayar_view&status=1');
	}
	mysql_close();
}
?>
