<?php
session_start();

// apakah session 'xyb_injection' sudah ada?
if (!isset($_SESSION['xyb_injection'])
   || $_SESSION['xyb_injection'] !== true) {

   // jika blm ada berarti user tersebut blm login, so, di redirect ke halaman login.
   header('Location: index.php');
   exit;
}
?>

<html>
<head>
<title>Main User Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
</head>

<body>
<p class="style1">Selamat anda telah berhasil masuk ke halaman administrator, SQL Injection sepertinya
sudah anda kuasai :D  <br></p>

<form method=POST action=update_attacker.php>
<p class="style1" align="center">Nick ID :  
  <input type=text name=attacker>
  <input type=submit value=Save>


</p>
<p align="center"><a href="logout.php">Logout</a> </p>
</body>
</html>