<?php
session_start();
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
<title>Explore Your Brain - Edit Berita </title>
<?php
// apakah session 'xyb_injection' sudah ada?
if (!isset($_SESSION['xyb_injection'])
        || $_SESSION['xyb_injection'] !== true) {

   // jika blm ada berarti user tersebut blm login, so, di redirect ke halaman login.
   header('Location: index.php');
   exit;
}

include "../library/config.php";
include "../library/opendb.php";
$edit=mysql_query("select id,judul,berita from table_berita where id='$_GET[id]'");
$x=mysql_fetch_array($edit);
echo "<h2>Edit Berita</h2>
<form method=POST action=update_berita.php>
<table><tr><td>Judul</td>
           <td><input type=text name='txtjudul' value='$x[judul]'></td></tr>
	   <tr><td>Isi Berita</td>
           <td><textarea name='txtberita' cols=50 rows=10'>$x[berita]</textarea></td></tr>
       <tr><td colspan=2><input type=submit value=Update>
                         <input	type=Button value=Batal onclick=self.history.back()></td></tr>
						 <input type=hidden name=id value='$x[id]'>
						 <input type=hidden name=tanggal value='$x[tanggal]'>
</table>						 
</form>";
include "../library/closedb.php";
?>	   	  
<p align="center"><a href="tambah_berita.php">Add an article</a> | <a href="logout.php">Logout</a> | 
<a href="admin.php">Main Admin</a></p> 
</body>
</html>