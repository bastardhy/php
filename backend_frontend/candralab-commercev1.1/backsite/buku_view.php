<?php
//include ('ind/config.php');
?><table   border=0>
<tr style="background-color:#F79307">
<td>Kd buku</td><td>Judul</td><td>Pengarang</td><td>Harga</td><td>Operasi</td></tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$kd_buku=$_GET['id'];
$hapus ="delete from buku where kd_buku='$kd_buku'";
mysql_query($hapus) or die(mysql_error());

}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  buku where kd_buku like '%$cari%'";
}else{
$sql="SELECT * FROM  buku";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>

<td><?  echo $rows['kd_buku'];?></td>

<td><?  echo $rows['judul'];?></td>

<td><?  echo $rows['pengarang'];?></td>
<td><?  echo $rows['harga'];?></td>
<td>
<!--<a href="index.php?page=buku_form_edit&id=<? echo $rows['kd_buku']?>">
<img src="image/b_edit.png"></a>-->
<a href="index.php?page=buku_view&del=true&id=<? echo $rows['kd_buku']?>"  onclick="return askUser()";>
<img src="image/b_drop.png"></a>|
detail
</td>
</tr>

<?
}

//tutup koneksi
?>
<tr><td align=right colspan='4'>
<?php
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}
?>
</td>
<td align=right><a href="index.php?page=buku_form_add">
<img src="image/add.jpg"> Tambah</a></td></tr>
<td align=right><a href="buku_cetak.php" target='_blank'>
cetak</a></td></tr>
<tr></tr>
</table>
<?

mysql_close();
//close database

//tampilan siapa yang login
?>

