<?php
session_start();

// apakah session 'xyb_injection' sudah ada?
if (!isset($_SESSION['xyb_injection'])
   || $_SESSION['xyb_injection'] !== true) {

   // jika blm ada berarti user tersebut blm login, so, di redirect ke halaman login.
   header('Location: index.php');
   exit;
}

include '../library/config.php';
include '../library/opendb.php';

if(isset($_GET['del']))
{
   $query = "DELETE FROM table_berita WHERE id = '{$_GET['del']}'";
   mysql_query($query) or die('Mr.SQL Said : ' . mysql_error());
 
}
?>
<html>
<head>
<meta name="description" content="SQL Injection Exposed - Sebuah situs yang di buat
untuk belajar memahami tentang bagaimana SQL Injection bisa melumpuhkan 
situs-situs di dunia maya ini."/>
<meta name="keywords" content="SQL Injection, SQL Union Injection, Tutorial SQL Injection"/> 
<meta name="EVA-00" content="Thanks for view source :D"/> 
<link rel="stylesheet" type="text/css" href="../default.css" media="screen"/>
<title>Admin Page For Content Management System (CMS)</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
function delArticle(id, title)
{
   if (confirm("Yakin mau menghapus article '" + title + "'"))
   {
      window.location.href = 'admin.php?del=' + id;
   }
}
</script>
</head>

<body>
<?php
$batas=10;
$halaman=$_GET['page'];
if (empty($halaman)) 
  {
    $posisi=0;
	$halaman=1;
  }
else
  {
    $posisi=($halaman-1)*$batas;
  }
  
$query = "SELECT id, judul FROM table_berita limit $posisi,$batas ";
$result = mysql_query($query) or die('Mr.SQL Said : ' . mysql_error());

?>
<table width="600" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#999999">
<tr align="center" bgcolor="#CCCCCC">
<td width="500"><strong>Title</strong></td>
<td width="150"><strong>Action</strong></td>
</tr>
<?php
while(list($id, $title) = mysql_fetch_array($result, MYSQL_NUM))
{

?>
<tr bgcolor="#FFFFFF">
<td width="500">
<?php echo $title;?>
</td>
<td width="150" align="center">
<a href="../index.php?id=<?php echo $id;?>" target="_blank">view</a>
| <a href="edit_berita.php?id=<?php echo $id;?>">edit</a>
| <a href="javascript:delArticle('<?php echo $id;?>',
'<?php echo $title;?>');">delete</a></td>
</tr>
<?php
}

?>
</table>
<?php
$tampil=mysql_query("SELECT id, judul FROM table_berita");
$jmldata=mysql_num_rows($tampil);
$jmlhalaman=ceil($jmldata/$batas);
$self=$_SERVER[PHP_SELF];

echo "<center>Halaman :";
for ($x=1;$x<=$jmlhalaman;$x++)
  if ($x != $halaman)
    {
	  echo "<a href=$self?page=$x>$x</a> ";
	}
  else
   {
     echo "<b>$x</b>";
   }  
   
echo "<p>Total Berita : <b>$jmldata</b></p></center><br>";
include '../library/closedb.php';
?>
<p align="center"><a href="tambah_berita.php">Tambah Berita</a> | <a href="logout.php">Logout</a> | 
<a href=admin.php>Main Admin</a></p>
</body>
</html>
