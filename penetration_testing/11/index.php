<?php
include 'library/config.php';
include '../config.php';
//Jika pengiriman id tidak ada, tampilkan list berita
if(!isset($_GET['id']))
{ 
   // buat table untuk menampilkan list berita
   $content = '<table border=0 align=center><tr align=center><th>No</th><th>Judul</th><th>Date</th><th>Dilihat</tr>';
   $batas=10;
   $halaman=$_GET['page'];
   if (empty($halaman))
      { 
	    $posisi=0;
		$halaman=1;
	  }
   else
     {
	   $posisi=($halaman-1) * $batas;
	 }   
   $self = $_SERVER['PHP_SELF'];
   $query = "SELECT id, judul, tanggal, counter FROM table_berita  limit $posisi,$batas";
   $result = mysql_query($query) or die('Mr.SQL Said : ' . mysql_error());
   $no=$posisi+1;
   while($row = mysql_fetch_array($result, MYSQL_NUM))
   {
      list($id, $title, $tgl, $view) = $row;
      $content .= "<tr><td>$no</td><td><a href=\"$self?id=$id\">$title</a></td><td>$tgl</td><td align=center>$view</td>\r\n";
	  $no++;
   }
   
   $tampil=mysql_query("select * from table_berita");
   $jmldata=mysql_num_rows($tampil); 
   $jmlhalaman=ceil($jmldata/$batas);
   $content.="<tr><td colspan=4 align=center>Page : ";
   for ($x=1;$x<=$jmlhalaman;$x++)
     if ($x !=$halaman)
        {
		  $content .="<a href=$self?page=$x>  $x </a>";
		}	 
	 else
        {
		  $content .="<b>$x</b> ";
		}	 
   $content .="</tr></td>";	 	
   $content .= '</table>';
   
   
   $title = 'SQL Injection Exposed';
} else {
   $query  = "SELECT * FROM table_berita where id=".$_GET['id'];
   $result = mysql_query($query) or die('<b>Mr.SQL Said : </b>' . mysql_error());
   $row    = mysql_fetch_array($result, MYSQL_ASSOC);

   $title   = $row['judul'];
   $content = $row['berita'];
   $tgl     = $row['tanggal'];
   $view    = mysql_query ("update table_berita set counter=$row[counter]+1
                                    where id='$_GET[id]'");
   							
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
<link rel="stylesheet" type="text/css" href="default.css" media="screen"/>
<title>Explore Your Brain - <?php echo $title; ?></title>
</head>
<body>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="1" bgcolor="#336699">
<tr><td bgcolor="#FFFFFF"><h2 align="center"><?php echo $title; ?></h2>
<center><a href="rss.php?name=test">Buku Tamu</a></center>
<?php
echo $content;
if(isset($_GET['id']))
{
?>
<p align="center"><a href="index.php">Back</a></p>
<?php
}
?>
</td>
</tr>
</table>
<?php include "footer.php";?>
</body>
</html>


