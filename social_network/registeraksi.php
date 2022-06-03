<?php
	include "koneksi.php";
	$query = mysql_query("insert into user (username, password, email, tgllahir, jk, tgldaftar) values ('$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[thn]-$_POST[bln]-$_POST[tgl]', '$_POST[jk]', NOW())");
	
	if($query){
		echo "Proses Registrasi Berhasil, Data anda sudah tersimpan";
		echo "<br>Silahkan <a href='index.php'>Login</a> disini";
	}else{
		echo "Registrasi Gagal";
		echo "<br>Silahkan <a href='index.php'>Registrasi Ulang</a> disini";
	}
?>