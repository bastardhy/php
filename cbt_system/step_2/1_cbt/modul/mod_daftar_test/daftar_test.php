<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
switch($_GET[act]){
  // Tampil Menu Utama Khusus Untuk Level User Admin.
  default:
  echo "<header>
		<h2>Daftar Test Yang Tersedia Antuk <b>$_SESSION[jabatan]</b></h2></header><section class='container_6 clearfix'><section class='with-table'><div class='grid_6'></header>";
		$daftar=mysqli_query($konek,"SELECT * FROM kategori ORDER BY id_kategori");
    	while($d=mysqli_fetch_array($daftar)){
        echo"<a href ='?module=test&id_kategori=$d[id_kategori]&halaman=1'><button class='button button-orange'>$d[nama_kategori]</button></a>
		";
        }
  echo"</div>";
  
break;
case "recent":  
}
}
?>
