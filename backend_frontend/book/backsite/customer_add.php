<?php
include('inc/config.php');
//data dari user
if(isset($_POST['tambahLogin'])){
	$kd_pemesan=$_POST['kd_pemesan'];
	$Nama=$_POST['Nama'];
	$Alamat=$_POST['Alamat'];
	$kd_pos=$_POST['kd_pos'];
	$No_telp=$_POST['No_telp'];
	$Email=$_POST['Email'];
	
				$sql="INSERT INTO pemesan(kd_pemesan,Nama,Alamat,kd_pos,No_telp,Email)
		VALUES('$kd_pemesan', '$Nama', '$Alamat','kd_pos','No_telp','Email')";
		$result=mysql_query($sql) or die(mysql_error());

		//check if query successful 
	if($result){
		header('location:index.php?page=cart.php');
	}else {
	header('location:index.php?page=cart.php');
	}
	mysql_close();
	}

?>
