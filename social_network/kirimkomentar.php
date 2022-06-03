<?php
	session_start();
	include "koneksi.php";
	$x = nl2br($_POST['komentar']);
	mysql_query("insert into komentar (iduser, idstatus, komentar, tglkomentar) values ('$_POST[iduser]', '$_POST[idstatus]', '$x', NOW())");
	
	if($_GET['mod'] == "kom"){
		header("location:home.php");
	}else{
		header("location:account.php?username=$_SESSION[nama]");
	}
?>