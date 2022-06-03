<?php
	session_start();
	
	$nama_file   = $_FILES['fupload']['name'];
	$lokasi_file = $_FILES['fupload']['tmp_name'];
	
	if(!empty($lokasi_file)){
		move_uploaded_file($lokasi_file, "foto/$nama_file");
		include "koneksi.php";
		mysql_query("update user set foto='$nama_file' where iduser='$_POST[iduser]'");
		header("location:account.php?username=$_SESSION[nama]");
	}else{
		echo "Foto tidak bisa diganti<br>";
		echo "Kembali ke <a href='account.php?username=$_SESSION[nama]'>Akun Anda</a>";		
	}
?>