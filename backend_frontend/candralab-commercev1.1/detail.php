<h2> Pilih Buku yang mau dibeli </h2>
<?php
//tentukan nilai batas
$batas=2;
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)* $batas;
}
$sql=null;
if(isset($_GET['id'])){
	$kd_kategori=$_GET['id'];
	$sql="select * from buku where kd_kategori='$kd_kategori' 
	limit $posisi,$batas";
}else if(isset($_GET['p'])){
	$kd_penerbit=$_GET['p'];
	$sql="select * from buku where kd_penerbit='$kd_penerbit' 
	limit $posisi,$batas ";
}else{
	$sql="select * from buku  limit $posisi,$batas";
}

include('backsite/inc/config.php');

$hasil=mysql_query($sql) or die(mysql_error());

while($get_data=mysql_fetch_array($hasil)){
	

?>
<h2><?=$get_data['judul']
?></h2>
<div class="image_wrapper image_fl"><img src="cover/<?=$get_data['cover']?>" width='150px' heigth='150px'></a>
</div>
<p>
	<em>Penulis:.<?=$get_data['pengarang']
	?></em>
</p>
<p>
	<em>harga:.<?=$get_data['harga']
	?></em>
</p>
<p>
	<?=$get_data['deskripsi'];?>
</p>
<div class="btn_more">
	<a href="index.php?page=cart&action=add&id=<?=$get_data['kd_buku']?>">Add to cart</a>
</div>
<div style="clear: both"></div>
<?
}

//=============CUT HERE====================================
$tampil2=mysql_query("select * from buku");
$jmldata=mysql_num_rows($tampil2);
$jumlah_halaman=ceil($jmldata/$batas);

echo "Halaman :";
for($i=1;$i<=$jumlah_halaman;$i++)
if ($i!=$halaman){
echo "<a href=index.php?page=detail&halaman=$i>$i</a>|";
}else{
echo "<b>$i</b>|";
}
mysql_close();
?>
<br>
Jumlah data :<?=$jmldata;
?>

