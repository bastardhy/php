<html>
	<head>
		<link rel="stylesheet" type="text/css" media="screen" href="style2.css" />
	</head>
	<body>
		<h2 align="center"> Laporan Daftar Buku </h2>
		<h1 align="center"> Toko Buku murah </h1>
		<p align="center">
			jl Lurus no 5 Yogyakarta
		</p>
		<hr>
		<br/>
		<?php?>
		<table align='center'>
			<tr style="background-color:#F79307">
				<td>No</td><td>Kd buku</td><td>Judul</td><td>Pengarang</td>
				<td>Harga</td>
			</tr>
			<?php
include ('inc/config.php');

$sql="SELECT * FROM  buku";

$result=mysql_query($sql) or die(mysql_error());

//proses menampilkan data
$no=1;
while($rows=mysql_fetch_array($result)){
			?>
			<tr>	<td><?=$no;?></td>
				<td><?		echo $rows['kd_buku'];?></td>
				<td><?		echo $rows['judul'];?></td>
				<td><?		echo $rows['pengarang'];?></td>
				<td><?		echo $rows['harga'];?></td>
			</tr>
			<?	
			$no++;	
				}
			?>
		</table>
		<?mysql_close();
?>
	</body>
</html>