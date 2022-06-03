<?php
	include ('inc/config.php');?><table  width="600px" border=0>
<tr style="background-color:#F79307">
<td>id_kota</td><td>nama_kota</td><td>biaya</td><td>Operasi</td></tr>

<?php
/*
* kode untuk menghapus data
*/
//===================paging
$batas=4;
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
//===========================
if(isset($_GET['del'])){
$id_kota=$_GET['id'];
$hapus ="delete from biaya_kirim where id_kota='$id_kota'";
mysql_query($hapus);
}
$sql="";
if(isset($_POST['btnCari'])){
$cari=$_POST['cari'];
//ambil data dari table admin
$sql="SELECT * FROM  biaya_kirim where id_kota like '%$cari%'";
}else{
$sql="SELECT * FROM  biaya_kirim limit $posisi,$batas";
}

$result=mysql_query($sql) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
?>
<tr>

<td><?echo $no+$posisi;?></td>

<td><?echo $rows['nama_kota'];?></td>

<td><?echo $rows['biaya'];?></td>

<td>
<a href="index.php?page=biaya_kirim_form_edit&id=<? echo $rows['id_kota']?>">
<img src="image/b_edit.png"></a>
<a href="index.php?page=biaya_view&del=true&id=<? echo $rows['id_kota']?>"  onclick="return askUser()";>
<img src="image/b_drop.png"></a>
</td>
</tr>

<?
$no++;
}

//tutup koneksi
?>
<tr><td align=right colspan='2'>
<?php
if(isset($_GET['status'])) {
	if($_GET['status'] == 0) {
		echo " Operasi data berhasil";
	} else {
		echo "operasi gagal";
	}
}?>
</td>
<td align=right><a href="index.php?page=biaya_kirim_form_add">
<img src="image/add.jpg"> Add</a></td></tr>
<tr></tr>
</table>
<?
	//=============CUT HERE====================================
	$tampil2 = mysql_query("select * from biaya_kirim");
	$jmldata = mysql_num_rows($tampil2);
	$jumlah_halaman = ceil($jmldata / $batas);

	echo "Halaman :";
	for($i = 1; $i <= $jumlah_halaman; $i++)
		if($i != $halaman) {
			echo "<a href=index.php?page=biaya_view&halaman=$i>$i</a>|";
		} else {
			echo "<b>$i</b>|";
		}
	mysql_close();?>
<br>
Jumlah data :<?=$jmldata;?>

<?mysql_close();
//close database

//tampilan siapa yang login?>

