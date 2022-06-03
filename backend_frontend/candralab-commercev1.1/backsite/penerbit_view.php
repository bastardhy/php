<?php
include ('inc/config.php');
?><table  width="600px" border=0>
<tr style="background-color:#F79307">
<td>Kode</td><td>Nama </td><td>telepon</td><td>Alamat</td><td>Operasi</td></tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$kd_penerbit=$_GET['id'];
$hapus ="delete from penerbit where kd_penerbit='$kd_penerbit'";
mysql_query($hapus);
}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  penerbit where kd_penerbit like '%$cari%'";
}else{
$sql="SELECT * FROM  penerbit";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>

<td><?  echo $rows['kd_penerbit'];?></td>

<td><?  echo $rows['nama'];?></td>
<td><?  echo $rows['telepon'];?></td>
<td><?  echo $rows['alamat'];?></td>

<td>
<a href="index.php?page=penerbit_form_edit&id=<? echo $rows['kd_penerbit']?>">
<img src="image/b_edit.png"></a>
<a href="index.php?page=penerbit_view&del=true&id=<? echo $rows['kd_penerbit']?>"  onclick="return askUser()";>
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
<td align=right><a href="index.php?page=penerbit_form_add">
<img src="image/add.jpg"> Tambah</a></td></tr>
<tr></tr>
</table>
<?

mysql_close();
//close database

//tampilan siapa yang login
?>

