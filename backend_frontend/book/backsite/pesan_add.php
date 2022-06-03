<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['tambahLogin'])) {
	$no_pesan = $_POST['no_pesan'];
	$kd_kategori = $_POST['kd_kategori'];
	$kd_pemesan = $_POST['kd_pemesan'];

	$sql = "INSERT INTO jenis_buku(no_pesan,tgl_pesan,kd_pemesan)
		VALUES('$no_pesan', '$tgl_pesan', '$kd_pemesan')";
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
