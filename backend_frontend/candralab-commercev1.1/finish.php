<?

$id_kota = $_SESSION['id_kota'];
$kd_pesan=$_SESSION['kd_pesan'];
//echo "nama kota:".$id_kota;
//echo "SESSION KOTA:".$_SESSION['id_kota'];
$get_data = mysql_query("select biaya from biaya_kirim where id_kota='$id_kota'") or die(mysql_error());
$biaya = mysql_fetch_array($get_data);
$biaya = $biaya['biaya'];
$totalBayar = $_SESSION['totalbayar'];
?>

<h3> Selamat,Transaksi sukses di lakukan</h2>
<h3> Kode Pesan :<?=$kd_pesan;?></h2>
<h3>Total Harga :<?=  $totalBayar;?></h2>
<h3> Biaya kirim :<?=$biaya;?></h2>
<h3>Total Transfer:<?=($totalBayar+$biaya)
?></h2>
<p>
	Silahkan transfer uang ke
</p>
<blockquote>
	Candra Adi putra
	<br>
	BNI Syariah Yogyakarta
	<br>
	No Rek 12345678
	<br>
</blockquote>
<hr>
<p>
	Konfirmasi pembayaran dapat anda lakukan di menu konfirmasi pembayaran, setelah anda melakukan
	Transfer uang ke rekening kami
</p>
<?
session_destroy();
?>