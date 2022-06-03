<?php
session_start();
include ('backsite/inc/config.php');
// Include MySQL class
require_once ('inc/mysql.class.php');
// Include database connection
require_once ('inc/global.inc.php');
// Include functions
require_once ('inc/functions.inc.php');
require_once ('inc/common_function.php');
// Start the session

session_register('id_kota');
session_register('kd_pesan');
//data dari user
if (isset($_POST['tambah'])) {
	/* menambahkan kode pesan dan detail pesan kedalam database*/
	$kode_pesan = kode_pesan();
	//echo $kode_pesan;
	//exit();
	$_SESSION['kd_pesan']=$kode_pesan;
	
	insertToDB($kode_pesan);
	/* the one line above is magic , please don't remove or your system will fail */
	//exit();
	$Nama = $_POST['Nama'];
	$Alamat = $_POST['Alamat'];
	$kd_pos = $_POST['kd_pos'];
	$No_telp = $_POST['No_telp'];
	$Email = $_POST['Email'];
	$id_kota = $_POST['id_kota'];
	$_SESSION['id_kota'] = $id_kota;
$kd_customer=kode_customer();

	$sql = "INSERT INTO customer(kd_pemesan,Nama,Alamat,kd_pos,No_telp,Email,id_kota,kd_pesan)
		VALUES('$kd_customer', '$Nama', '$Alamat','$kd_pos','$No_telp','$Email','$id_kota','$kode_pesan')";

	$result = mysql_query($sql) or die(mysql_error());

	$_SESSION['cart'] = '';
	//check if query successful

	if ($result) {

		header('location:index.php?page=finish');

	} else {
		header('location:index.php?page=cart');
	}
	mysql_close();
}
?>
