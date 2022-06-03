<?php
include ('inc/config.php');
?><table  width="600px" border=0>
<tr style="background-color:#F79307">
<td>No pembayaran</td><td>Tgl_pembayaran</td><td>No Pesan</td><td>Total Harga</td><td>Status</td><td>Operasi</td></tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$no_pembayaran=$_GET['id'];
$hapus ="delete from pembayaran where no='$no_pembayaran'";
mysql_query($hapus) or die(mysql_error());
}
if(isset($_GET['app'])){
$no_pembayaran=$_GET['id'];
$app ="update  pembayaran set status='sudah' where no='$no_pembayaran'";
mysql_query($app) or die(mysql_error());
}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  pembayaran where no_pembayaran like '%$cari%'";
}else{
$sql="SELECT * FROM  pembayaran";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>

<td><?  echo $rows['no'];?></td>

<td><?  echo $rows['tanggal'];?></td>

<td><?  echo $rows['kd_pesan'];?></td>

<td><?  echo $rows['total_bayar'];?></td>
<td><?  echo $rows['status'];?></td>

<td>
<a href="index.php?page=bayar_view&app=true&id=<? echo $rows['no']?>">
<img src="image/approve.jpg"></a>
<a href="index.php?page=bayar_view&del=true&id=<? echo $rows['no']?>"  onclick="return askUser()";>
<img src="image/b_drop.png"></a>
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
<td align=right></td></tr>
<tr></tr>
</table>
<?

mysql_close();
//close database

//tampilan siapa yang login
?>

