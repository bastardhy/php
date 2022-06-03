<?php
$connect = mysqli_connect("localhost", "root","","dbphpgila");

$filename = $_FILES["filename"]["tmp_name"];		

if($_FILES["filename"]["size"] > 0)
{
	$file = fopen($filename, "r");
	
	while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	{
		$sql = "INSERT INTO as_members (nama_lengkap,alamat,telepon,jk,biografi)
				VALUES ('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]')";
		$result = mysqli_query($connect, $sql);
		
		if(!isset($result))
		{
			echo "FILE INVALID, HANYA CSV YANG DIIZINKAN";
		}
		else {
			echo "FILE BERHASIL DIIMPORT";
		}
	}
	
	fclose($file);
}
?>