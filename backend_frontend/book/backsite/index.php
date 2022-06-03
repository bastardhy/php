<?php
session_start();

if(!isset($_SESSION['username'])){
header("location:form_login.php");
}

	require_once 'inc/config.php';
require_once('../inc/common_function.php');

?>

<h1></h1><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--
 ____________________________________________________________
|                                                            |
|      CODE + Pat Heard { http://fullahead.org }             |
|      DATE + 2007.11.08                                     |
| COPYRIGHT + Creative Commons Attribution 3.0 Unported      |
|             http://creativecommons.org/licenses/by/3.0/    |
|____________________________________________________________|

-->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>


  <title>Administrasi website </title>


  <link rel="stylesheet" type="text/css" media="screen, tv, projection" href="../css/html.css" />
  <link rel="stylesheet" type="text/css" media="screen, tv, projection" href="../css/layout.css" />

  <script type="text/javascript">
	function askUser() {
		return window.confirm("Yakin ingin menghapus record ini?");
	}
  </script>
  <script type="text/javascript" src="../js/validjs.js"></script>

  </head>

<body>

<!-- Full site width container -->
<div class="width100">

  <!-- #header: holds main image, menu and top actions bar -->
  <div id="header" class="floatLeft width100">

    <div class="floatLeft width100 rightBorder">

      <div id="title">
        <h1>Admin page</h1>
        <p>
         Halaman Administrasi
        </p>
      </div>


    </div>




  </div>
  <!-- end #header -->



  <!-- #content: holds site content -->
  <div id="content">



    <!-- Right column, 25% width -->
    <div class="floatLeft width25 rightMargin">
<ul id="menu">
               <li>
         <h2>Koleksi</h2>
		  <ul  class="arrow">
		  <li><a href="index.php?page=buku_view">buku</a></li>
		  <li><a href="index.php?page=kategori_view">kategori</a></li>
		  	  <li><a href="index.php?page=penerbit_view">Penerbit</a></li>
		  </ul>
        </li>
		   <li>
         <h2>Pesan</h2>
		  <ul  class="arrow">
		  <li><a href="index.php?page=customer_view">Customer</a></li>
		  <li><a href="index.php?page=pesan_view">Pesan</a></li>
		  <li><a href="index.php?page=det_pesan_view">Detail pemesanan</a></li>
		  <li><a href="index.php?page=bayar_view">pembayaran</a></li>
		  </ul>

        </li>
         <li>
		         <h2>Biaya kirim</h2>
				  <ul  class="arrow">
				  <li><a href="index.php?page=biaya_view">Biaya per kota</a></li>

				  </ul>
        </li>

         <li> <h2>Setting</h2>
		  <ul  class="arrow">

		<li><a href="index.php?page=pengelola_view">Pengelola</a></li>
		  </ul>
        </li>


      </ul>
      <!--<h1>help</h1>

      <blockquote>
        <h2>Koleksi</h2>
			<p>Pengolahan data untuk jenis buku dan daftar buku

        </p>
		<h2>Pesan</h2>
			<p>Pengolahan data tabel pemesan(pembeli), pesan, detail pesan dan pembayaran


        </p>
		<h2>Setting</h2>
			<p>Bagian ini untuk mengganti text halaman dan user/password pengelola

        </p>
      </blockquote>
-->



    </div>
    <!-- end right column, 25% width -->
    <!-- Left column, 75% width -->
    <div class=" floatLeft width75">

<!--table pengolahan data nanti disini-->
<?php
/* kode untuk meload halaman yang berbeda*/
if (isset($_GET['page'])) {
	$page = $_GET['page'] . ".php";
	include ($page);

} else {
	include ('buku_view.php');
}
?>


    </div>
    <!-- end left column, 75% width -->

  </div>
  <!-- end #content -->



  <!-- #footer: holds submenu and copyright info -->
  <div id="footer" class="floatRight  width100">




    <p>
    copyright(c) 2012,|<a href="../index.php">home</a>|<a href="pengelola_logout.php">Logout</a>
    </p>

  </div>
  <!-- end #footer -->


</div>
<!-- end full site width container -->


</body>
</html

<?
/*
}else{
header("location:form_login.php");
}
*/
 
?>