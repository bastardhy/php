<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['tambah'])) {
	$kd_buku = $_POST['kd_buku'];
	$kd_kategori = $_POST['kd_kategori'];
	$kd_penerbit = $_POST['kd_penerbit'];
	$harga = $_POST['harga'];
	
	$deskripsi = $_POST['deskripsi'];
	$pengarang = $_POST['pengarang'];
	$judul = $_POST['judul'];



$lokasi_file = $_FILES['cover']['tmp_name'];
$nama_file = $_FILES['cover']['name'];
$cover=$nama_file;
$direktori = "../cover/$nama_file";

if (move_uploaded_file($lokasi_file, $direktori)) {

	$sql = "INSERT INTO buku(kd_buku,judul,pengarang,kd_penerbit,kd_kategori,harga,cover,deskripsi)
		VALUES('$kd_buku','$judul','$pengarang','$kd_penerbit','$kd_kategori','$harga','$cover','$deskripsi')";
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=buku_view&status=0');
	} else {
		header('location:index.php?page=buku_view&status=1');
	}
	mysql_close();
}
}
?>
