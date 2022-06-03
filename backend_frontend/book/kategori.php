<h1> Pilih Kategori buku</h1>
<ul>
	<?php
include('backsite/inc/config.php');
$kat="select kd_kategori,nama_kategori from kategori";
$hasil=mysql_query($kat) or die(mysql_error());
while($get_data=mysql_fetch_array($hasil)){

	?><li><a href="index.php?page=detail&id=<?=$get_data['kd_kategori']?>">
		<? echo $get_data['nama_kategori']?>
		<!--(<?=$get_data['jumlah']?>)-->
	</a></li>
	<?
	}
	?>
</ul>