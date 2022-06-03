<?php
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/class_paging.php";

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin'){
echo"<main-content grid_4 alpha><div class='main-content'><header><h2>Administrator Computer Based Test</h2></header><section class='container_6 clearfix'>";
$jam=date("H:i:s");
$tgl=tgl_indo(date("Y m d")); 	
  
echo "  <div style=\"display: inline-block; width: 100%; margin-bottom: 15px; clear: both;\">
        <div style=\"float: left; width: 49%;\">
        <div style=\"background: #FFF; color: #547C96; border: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;\">Selamat Datang Di Sistem Tes Berbasis Komputer</div>";          
 echo "<br /><p align=center>Hai <b>$_SESSION[namauser]</b>, selamat datang di halaman Administrator. 
          Silahkan klik menu pilihan yang berada di bagian header untuk mengelola sistem Aplikasi Ini. <br /> <b>$hari_ini, $tgl, $jam </b>WIB</p><br />";echo "</div>";
echo "<div style=\"float: right; width: 49%;\"><img src=images/welcome.jpg width=460 height=130 border=0>";          
  
    echo "</div></div>";
	

  
  }
  	elseif ($_SESSION['leveluser']=='guru'){
  	echo"<main-content grid_4 alpha><div class='main-content'><header><h2>Beranda Penguji</h2></header><section class='container_6 clearfix'>";
	$jam=date("H:i:s");
	$tgl=tgl_indo(date("Y m d")); 
	echo "  <div style=\"display: inline-block; width: 100%; margin-bottom: 15px; clear: both;\">
        <div style=\"float: left; width: 49%;\">
        <div style=\"background: #FFF; color: #547C96; border: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;\">Selamat Datang Computer Based Test</div>";          
 	echo "<br /><p align=center>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Administrator. 
 		  <br />Anda Berhak Mengelola Menu Sesuai Jabatan Anda sebagai <b>$_SESSION[jabatan]</b>
          <br />Silahkan klik menu pilihan yang berada di bagian header untuk mengelola sistem Aplikasi Ini. <br /> <b>$hari_ini, $tgl, $jam </b>WIB</p><br />";echo "</div>";
	echo "<div style=\"float: right; width: 49%;\"><img src=images/klinik.jpg width=460 height=130 border=0>";     
  	echo "</div></div>";
	
 	}
	elseif ($_SESSION['leveluser']=='siswa'){
  	echo"<main-content grid_4 alpha><div class='main-content'><header><h2>Beranda Peserta Tes</h2></header><section class='container_6 clearfix'>";
	$jam=date("H:i:s");
	$tgl=tgl_indo(date("Y m d")); 
	echo "  <div style=\"display: inline-block; width: 100%; margin-bottom: 15px; clear: both;\">
        <div style=\"float: left; width: 49%;\">
        <div style=\"background: #FFF; color: #547C96; border: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;\">Selamat Datang Computer Based Test</div>";          
 	echo "<br /><p align=center>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Test Berbasis Komputer (CBT). 
 		  <br />Silahkan Pilih Test Yang Tersedia Untuk <b>$_SESSION[jabatan]</b>
          <br />Silahkan klik menu pilihan yang berada di bagian header untuk mengelola sistem Aplikasi Ini. <br /> <b>$hari_ini, $tgl, $jam </b>WIB</p><br />";echo "</div>";
	echo "<div style=\"float: right; width: 49%;\"><img src=images/klinik.jpg width=460 height=130 border=0>";     
  	echo "</div></div>";
	
 	}
}

// Bagian User
elseif ($_GET['module']=='user'){
echo"<main-content grid_4 alpha><div class='main-content'>";
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='guru' OR $_SESSION[leveluser]=='siswa'){
    include "modul/mod_users/users.php";
  }
}

// Bagian Menu Utama
elseif ($_GET['module']=='menuutama'){
echo"<main-content grid_4 alpha><div class='main-content'>";
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='guru' OR $_SESSION[leveluser]=='siswa'){
    include "modul/mod_menuutama/menuutama.php";
  }
}

// Bagian Sub Menu
elseif ($_GET['module']=='submenu'){
echo"<main-content grid_4 alpha><div class='main-content'>";
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_submenu/submenu.php";
  }
}

// Bagian Kategori
elseif ($_GET['module']=='kategori'){
echo"<main-content grid_4 alpha><div class='main-content'>";
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Daftar Pertanyaan
elseif ($_GET['module']=='pertanyaan'){
echo"<main-content grid_4 alpha><div class='main-content'>";
  if ($_SESSION[leveluser]=='guru'){
    include "modul/mod_pertanyaan/pertanyaan.php";
  }
}
// Bagian Hasil Test
elseif ($_GET['module']=='hasiltest'){
echo"<main-content grid_4 alpha><div class='main-content'>";
  if ($_SESSION['leveluser']=='guru'){
    include "modul/mod_hasiltest/hasiltest.php";
  }
}
// Bagian Daftar Tes Aktif
elseif ($_GET['module']=='daftar_test'){
echo"<main-content grid_4 alpha><div class='main-content'>";
  if ($_SESSION['leveluser']=='siswa'){
    include "modul/mod_daftar_test/daftar_test.php";
  }
}
// Bagian Daftar Tes Aktif
elseif ($_GET['module']=='test'){
echo"<main-content grid_4 alpha><div class='main-content'>";
  if ($_SESSION['leveluser']=='siswa'){
    include "modul/mod_daftar_test/test.php";
  }
}






// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
	</table>
	
	<script type="text/javascript">
	$('#myHTMLTable').convertToFusionCharts({
		swfPath: "Charts/",
		type: "MSColumn3D",
		data: "#myHTMLTable",
		dataFormat: "HTMLTable"
	});
	</script>
