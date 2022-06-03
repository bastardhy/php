<?php
	session_start();
	include "koneksi.php";
	mysql_query("update user set namalengkap='$_POST[namalengkap]', panggilan='$_POST[panggilan]', tmplahir='$_POST[tmplahir]', tgllahir='$_POST[thn]-$_POST[bln]-$_POST[tgl]', jk='$_POST[jk]', alamat='$_POST[alamat]', nohp='$_POST[nohp]', email='$_POST[email]', website='$_POST[website]', status='$_POST[status]', hobi='$_POST[hobi]', aboutme='$_POST[aboutme]' where iduser='$_POST[iduser]'");
	header("location:account.php?iduser=$_POST[iduser]");
?>