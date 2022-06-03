<?php
include ('inc/config.php');
?><table  width="600px" border=0>
<tr style="background-color:#F79307">
<td>No Detail Pesan</td><td>No Pesan</td><td>Kd buku</td><td>Total Pesan</td><td>Operasi</td></tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$no_det_pesan=$_GET['id'];
$hapus ="delete from det_pesan where no_det_pesan='$no_det_pesan'";
mysql_query($hapus);
}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  det_pesan where no_det_pesan like '%$cari%'";
}else{
$sql="SELECT * FROM  det_pesan";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>

<td><?  echo $rows['no_det_pesan'];?></td>

<td><?  echo $rows['no_pesan'];?></td>

<td><?  echo $rows['kd_buku'];?></td>

<td><?  echo $rows['jumlah'];?></td>

<td>
<!--<a href="index.php?page=det_pesan_form_edit&id=<? echo $rows['no_det_pesan']?>">
<img src="image/b_edit.png"></a>-->
<a href="index.php?page=det_pesan_view&del=true&id=<? echo $rows['no_det_pesan']?>"  onclick="return askUser()";>
<img src="image/b_drop.png"></a>
</td>
</tr>

<?
}

//tutup koneksi
?>
<tr><td align=right colspan='3'>
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

</table>
<?

mysql_close();
//close database

//tampilan siapa yang login
?>

