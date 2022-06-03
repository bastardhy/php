
<ul>
	<?php
include('backsite/inc/config.php');
$kat="select kategori.nama_kategori, kategori.kd_kategori,
                       count(buku.kd_buku) as jumlah 
                       from kategori, buku 
                       where buku.kd_kategori=kategori.kd_kategori 
                       group by kategori.nama_kategori";
$hasil=mysql_query($kat) or die(mysql_error());
while($get_data=mysql_fetch_array($hasil)){

	?><li><a href="index.php?page=detail&id=<?=$get_data['kd_kategori']?>">
		<? echo $get_data['nama_kategori'];
		echo "(".$get_data['jumlah'].")";
		?>
		<!--(<?=$get_data['jumlah']?>)-->
	</a></li>
	<?
	}
	?>
</ul>
<h3> Penerbit</h3>
<ul>
	<?php
include('backsite/inc/config.php');
$kat="select penerbit.nama,penerbit.kd_penerbit,
                       count(buku.kd_buku) as jumlah 
                       from penerbit, buku 
                       where buku.kd_penerbit=penerbit.kd_penerbit 
                       group by penerbit.nama";
$hasil=mysql_query($kat) or die(mysql_error());
while($get_data=mysql_fetch_array($hasil)){

	?><li><a href="index.php?page=detail&p=<?=$get_data['kd_penerbit']
		?>">
		<? echo $get_data['nama']?>
		(<?=$get_data['jumlah']?>)
	</a></li>
	<?
	}
	?>
</ul>