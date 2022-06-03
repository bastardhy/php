<?php
	session_start();
	include "koneksi.php";
	$x = nl2br($_POST['status']);
	mysql_query("insert into status (iduser, status, tglposting) values ('$_POST[iduser]', '$x', NOW())");
	
	if($_GET['mod'] == "stat"){
		header("location:home.php");
	}else{
		header("location:account.php?username=$_SESSION[nama]");
	}
?>