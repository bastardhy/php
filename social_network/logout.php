<?php
	session_start();
	include "koneksi.php";
   	$sql = mysql_query("select * from user where username='$_SESSION[nama]'");
	$r = mysql_fetch_array($sql);
	mysql_query("update user set online='N' where iduser='$r[iduser]'");
	session_destroy();
	header("location:index.php");
?>