<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['Tambah'])) {
	$kd_penerbit = $_POST['kd_penerbit'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$email = $_POST['email'];
	$website = $_POST['website'];

	$sql = "INSERT INTO penerbit(kd_penerbit,nama,alamat,telepon,email,website)
		VALUES('$kd_penerbit','$nama','$alamat','$telepon','$email','$website')";
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=penerbit_view&status=0');
	} else {
		header('location:index.php?page=penerbit_view&status=1');
	}
	mysql_close();
}
?>
