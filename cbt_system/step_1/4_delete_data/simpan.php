<?php
	include("koneksi.php"); //Koneksi Ke Database
	// Update Pertanyaan
	$query = "DELETE FROM tabel_soal WHERE id_soal='$_GET[id]'";
    mysqli_query($konek, $query);
	header('location: index.php');
?>
