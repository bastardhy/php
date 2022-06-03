<?		// Include MySQL class
					require_once ('inc/mysql.class.php');
					// Include database connection
					require_once ('inc/global.inc.php');
					// Include functions
					require_once ('inc/functions.inc.php');
					// Start the session
					session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
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
		<title>Toko buku Online</title>
		<link rel="stylesheet" type="text/css" media="screen, tv, projection" href="css/html.css" />
		<link rel="stylesheet" type="text/css" media="screen, tv, projection" href="css/layout.css" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen, tv, projection" /><![endif]-->
	</head>
	<body>
		<!-- Full site width container -->
		<div class="width100">
			<!-- #header: holds main image, menu and top actions bar -->
			<div id="header" class="floatLeft width100">
				<div class="floatLeft width25 rightBorder">
					<div id="title">
						<h1>toko Buku Online</h1>
						<p>
							Toko buku online, murah, lengkap, hemat!
						</p>
					</div>
					<ul id="menu" >
						<li>
							<a href="index.php?page=home">Home</a>
						</li>
						<li>
							<a href="index.php?page=cart"> keranjang Belanja</a>
						</li>
					<li>
							<a href="index.php?page=cara_pesan">Cara pesan</a>
						</li>
						<li>
							<a href="index.php?page=bayar_form_add">Konfirmasi Pembayaran</a>
						</li>
							
					</ul>
				</div>
				<div id="subMenu" class="floatRight width25"></div>
			</div>
			<!-- end #header -->
			<!-- #content: holds site content -->
			<div id="content">
				<!-- Right column, 25% width -->
				<div class="floatLeft width25 rightMargin">
					<?php				include ('kategori.php');?>
					<!--
					<h1>Slide </h1>
					<p>
					<img src="koleksi/005.jpg" alt="View Project"/>
					</p>
					<blockquote>
					Harga :100.000
					</blockquote>
					-->
					<p></p>
					<blockquote>
						<h1>Alamat kami</h1>
						<p>
							Jl Lurus no 5 Yogyakarta
							<br>
							Telp (0274) 123456
							<br>
							Email:bukumurah@gmail.com
						</p>
						<blockquote>
				</div>
				<!-- end right column, 25% width -->
				<!-- Left column, 75% width -->
				<div class="floatLeft width75">
					<!-- .post: Made up of text and meta columns - meta column will have blue background and stretch entire height of text post -->
					<div class="post floatLeft width75">
						<?php
/* kode untuk meload halaman yang berbeda*/
if(isset($_GET['page'])) {
	$page = $_GET['page'] . ".php";
	include ($page);

} else {
	include ('home.php');
}?>
					</div>
					<!-- end .post -->
				</div>
				<!-- end left column, 75% width -->
			</div>
			<!-- end #content -->
			<!-- #footer: holds submenu and copyright info -->
			<div id="footer" class="floatRight width100">
				<ul style="text-align:right">
					<li class="here">
						<a href="index.php?page=home">Home</a>
					</li>
					<a href="index.php?page=cara_pesan">Cara pesan</a>
					</li>
					<li>
						<a href="index.php?page=contact">Contact us</a>
					</li>
					<li>
						<a href="backsite/index.php">login</a>
					</li>
				</ul>
				<p style="text-align:right">
					copyright(c) 2013, toko Buku online
				</p>
			</div>
			<!-- end #footer -->
		</div>
		<!-- end full site width container -->
	</body>
</html>