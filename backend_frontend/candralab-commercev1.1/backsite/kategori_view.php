<?php
//include ('inc/config.php');
?><table  width="600px" border=0>
<tr style="background-color:#F79307">
<td>Kode</td><td>Nama kategori</td><td>Operasi</td></tr>

<?php
/*
* kode untuk menghapus data
*/
if(isset($_GET['del'])){
$kd_kategori=$_GET['id'];
$hapus ="delete from kategori where kd_kategori='$kd_kategori'";
mysql_query($hapus);
}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  kategori where kd_kategori like '%$cari%'";
}else{
$sql="SELECT * FROM  kategori";
}

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>

<td><?  echo $rows['kd_kategori'];?></td>

<td><?  echo $rows['nama_kategori'];?></td>



<td>
<a href="index.php?page=kategori_form_edit&id=<? echo $rows['kd_kategori']?>">
<img src="image/b_edit.png"></a>
<a href="index.php?page=kategori_view&del=true&id=<? echo $rows['kd_kategori']?>"  onclick="return askUser()";>
<img src="image/b_drop.png"></a>
</td>
</tr>

<?
}

//tutup koneksi
?>
<tr><td align=right colspan='2'>
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
<td align=right><a href="index.php?page=kategori_form_add">
<img src="image/add.jpg"> Add</a></td></tr>
<tr></tr>
</table>
<?

mysql_close();
//close database

//tampilan siapa yang login
?>

