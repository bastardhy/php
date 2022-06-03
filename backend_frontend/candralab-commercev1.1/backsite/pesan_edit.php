<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['submitUser'])) {
	$no_pesan = $_POST['no_pesan'];
	$tgl_pesan = $_POST['tgl_pesan'];
	$kd_pemesan = $_POST['kd_pemesan'];

	$sql = " update buku set no_pesan='$no_pesan' , tgl_pesan='$tgl_pesan', kd_pemesan='$kd_pemesan' where no_pesan='$no_pesan'";

	//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=pesan_view&status=0');
	} else {
		header('location:index.php?page=pesan_view&status=1');
	}
	mysql_close();
}
?>