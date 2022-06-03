<?php
	$host = "localhost";
	$user = "root";
	$pass = "lokalisasi";
	$db = "socialnetwork";

	$koneksi = mysql_connect($host, $user, $pass);
	$koneksidb = mysql_select_db($db, $koneksi);

	// Hanya buat ngetes doank...
	/*if($koneksi){
		echo "Koneksi ke MySQL Berhasil";
		if($koneksidb){
			echo "<br>Database yang dipilih $db";
		}else{
			echo "<br>Database tidak ada";
		}
	}else{
		echo "Koneksi GAGAL";
	}*/
?>
