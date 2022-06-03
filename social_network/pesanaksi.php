<?php
	include "koneksi.php";
	mysql_query("insert into pesan (iduserdari, iduserke, pesan, tglkirimpesan) values ('$_POST[iduserdari]', '$_POST[iduserke]', '$_POST[pesan]', NOW())");
	header("location:profil.php?iduser=$_POST[iduserke]");
?>