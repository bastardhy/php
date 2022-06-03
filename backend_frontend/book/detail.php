<h2> Pilih Buku yang mau dibeli </h2>
<?php
$kd_kategori=$_GET['id'];
include('backsite/inc/config.php');
$kat="select * from buku where kd_kategori='$kd_kategori'";
$hasil=mysql_query($kat) or die(mysql_error());

while($get_data=mysql_fetch_array($hasil)){
	

?>

<div class="meta floatLeft width25">
	<a href="index.html" title="View Project" class="thumb">
		 <img src="cover/<?=$get_data['cover']?>" width='150px' heigth='150px'> </a>
	<dl>
		<dt>
			<span>Harga</span>
		</dt>
		<dd>
			<?=$get_data['harga']
			?>
		</dd>
		<dt>
			<span>Pengarang</span>
		</dt>
		<dd>
			<?=$get_data['pengarang']
			?>
		</dd>
	</dl>
</div>
<!-- .text: content of post -->
<div class="meta floatRight width50">
	<a name="inspiration"></a>
	<h1><?=$get_data['judul']
	?></h1>
	<h2>Deskripsi </h2>
	<p>
		<?=$get_data['deskripsi'];?>
	</p>
	<a href="index.php?page=cart&action=add&id=<?=$get_data['kd_buku']?>">Add to cart</a>
</div>
<div style=clear:both></div>
; <?
}
?>
