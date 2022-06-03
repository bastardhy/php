<?php
include('inc/config.php');
//data dari user
if(isset($_POST['submitUser'])){
	$kd_pemesan=$_POST['kd_pemesan'];
	$Nama=$_POST['Nama'];
	$Alamat=$_POST['Alamat'];
	$kd_pos=$_POST['kd_pos'];
	$No_telp=$_POST['No_telp'];
	$Email=$_POST['Email'];
		
		
		$sql=" update pemesan set kd_pemesan='$kd_pemesan' , Nama='$Nama', Alamat='$Alamat', 
		kd_pos='$kd_pos',No_telp='$No_telp',Email='$Email', where kd_pemesan='$kd_pemesan'";
		
//echo $sql;
		$result=mysql_query($sql) or die(mysql_error());

		//check if query successful 
	if($result){
		header('location:index.php?page=buku_view&status=0');
	}else {
	header('location:index.php?page=buku_view&status=1');
	}
	mysql_close();
	}

?>