<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['submitUser'])) {
	$no_bayar = $_POST['no_bayar'];
	$tgl_bayar = $_POST['tgl_bayar'];
	$no_pesan = $_POST['no_pesan'];
	$total_harga = $_POST['total_harga'];

	$sql = " update bayar set tgl_bayar='$tgl_bayar' , 
	no_pesan='$no_pesan', total_harga='$total_harga' where no_bayar='$no_bayar'";

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