<?php
	include "koneksi.php";
	$login  = mysql_query("SELECT * FROM user WHERE username='$_POST[username]' AND password='$_POST[password]'");
	$ketemu = mysql_num_rows($login);
	$r      = mysql_fetch_array($login);
		
	if ($ketemu > 0){
		session_start();
		$_SESSION['nama']=$r['username'];
		$_SESSION['pass']=$r['password'];
	  mysql_query("update user set online='Y' where iduser='$r[iduser]'");
		header("location:home.php");
	}else{	
		 echo "Anda Gagal Login !!! <br> Ini Bukan Account Anda, silahkan <a href='index.php'>Register</a> disini.";
	}
?>