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
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta name="description" content="SQL Injection Exposed - Sebuah situs yang di buat
untuk belajar memahami tentang bagaimana SQL Injection bisa melumpuhkan 
situs-situs di dunia maya ini."/>
<meta name="keywords" content="SQL Injection, SQL Union Injection, Tutorial SQL Injection"/> 
<meta name="EVA-00" content="Thanks for view source :D"/> 
<link rel="stylesheet" type="text/css" href="../default.css" media="screen"/>
<title>Explore Your Brain - Input Berita</title>
<form method="post">
<table width="700" border="0" cellpadding="2" cellspacing="1" align="center">
<tr>
<td width="100">Title</td>
<td><input name="title" type="text"></td>
</tr>
<tr>
<td width="100">Content</td>
<td><textarea name="content" cols="50" rows="10"></textarea></td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="2" align="center"><input name="save" type="submit" value="Save Article"></td>
</tr>
</table>
<p align="center"><a href="tambah_berita.php">Add an article</a> | <a href="logout.php">Logout</a> | 
<a href=admin.php>Main Admin</a></p>
</form>
</body>
</html>

<?php

if(isset($_POST['save']))
{
   $title   = ($_POST['title']);	
   $content = ($_POST['content']);	 
   $tanggal = date("ymd");

   include '../library/config.php';
   include '../library/opendb.php';

   $query = " INSERT INTO table_berita (judul,berita,tanggal) ".
            " VALUES ('$title', '$content','$tanggal')";
   mysql_query($query) or die('Error ,query failed');

   include '../library/closedb.php';

   echo "<center>Article '$title' added</center>";
 
}
?>