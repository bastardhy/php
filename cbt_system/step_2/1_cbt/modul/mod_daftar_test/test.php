<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
   $user = $_SESSION[kategori];
   $kategori= $_GET['id_kategori'];  
   $daftar=mysqli_query($konek,"SELECT * FROM kategori WHERE id_kategori = $kategori ORDER BY id_kategori");
   $d=mysqli_fetch_array($daftar);
   echo "<header>
		<h2>Hi <b>$_SESSION[namalengkap]</b>, Jawab Pertanyaan Berikut Dengan Memilih Jawaban Dari Soal $d[nama_kategori] </h2>
		</header><section class='container_6 clearfix'><div class='grid_6'></header>";

echo"<div class='grid_4'>";
//Langkah 1: Tentukan batas,cek halaman & posisi data
$batas   = 1;
$halaman = $_GET['halaman'];
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}
else{
$posisi = ($halaman-1) * $batas;
}
//Tampilkan Soal Isi Dari Test		
$aksi="modul/mod_daftar_test/aksi_test.php";
$results = mysqli_query($konek,"SELECT * FROM tabel_soal WHERE id_kategori = $kategori ORDER BY id_soal ASC LIMIT $posisi, $batas");
$no=$posisi+1; // Agar angka (penomoran) mengikuti paging
while($r = mysqli_fetch_array($results))
	{
	$cek=mysqli_query($konek,"SELECT * FROM jawaban WHERE id_soal=$r[id_soal] AND id_user = $user");
 	$ketemu = mysqli_num_rows($cek);
  	if ($ketemu > 0){ //Tampilkan Soal Ketika Sudah Di Isi Untuk Memperbaiki Jawaban
 		//Tampilan Halaman Paging
	
		echo "<form method=POST enctype='multipart/form-data' action='$aksi?module=test&act=update'>
		<input type=hidden name=id_soal value=$r[id_soal]>
		 <input type=hidden name=id_kategori value=$d[id_kategori]>
		 <input type=hidden name=id_user value=$user>
		<input type=hidden name=halaman value=$halaman>
		<h2 class='leading'>$no.  $r[pertanyaan]</h2>";
		$tampil=mysqli_query($konek,"SELECT * FROM jawaban WHERE id_soal=$r[id_soal] AND id_user = $user");
		$j   = mysqli_fetch_array($tampil);
		if ($j['jawaban']=='A'){ 
		echo"<ul><h2><input type=radio name='jawaban' value='A' checked> A. $r[pilihan_a]</h2></ul>
		<ul><h2><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h2></ul>
		<ul><h2><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h2></ul>
		<ul><h2><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h2></ul>";
 		}
 		else if  ($j['jawaban']=='B'){ 
 		echo"<ul><h2><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='B' checked> B. $r[pilihan_b]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h2></ul>";
 		}
  		else if  ($j['jawaban']=='C'){ 
 		echo"<ul><h2><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='C' checked> C. $r[pilihan_c]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h2></ul>";
		 }
	 	else if  ($j['jawaban']=='D'){ 
 		echo"<ul><h2><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='D' checked> D. $r[pilihan_d]</h2></ul>";
 		}
 		else { 
 		echo"<ul><h2><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h2></ul>";
 		}
		 echo"
		 </li>
		 <td colspan=2><button class='button button-green'>Simpan</button></form>";
		$no++;
		
		echo "</ul>";
		}
		else //Tampilkan Soal Ketika Belum Di Isi
		{
		//Tampilan Halaman Paging
		echo "<ul class='page_result'>";
		echo "<form method=POST enctype='multipart/form-data' action='$aksi?module=test&act=input'>
		 <input type=hidden name=id_soal value=$r[id_soal]>
		 <input type=hidden name=id_kategori value=$d[id_kategori]>
		 <input type=hidden name=id_user value=$user>
		<input type=hidden name=halaman value=$halaman>
		<h2 class='leading'>$no.  $r[pertanyaan]</h2>";
		$tampil=mysqli_query($konek,"SELECT * FROM jawaban WHERE id_soal=$r[id_soal] AND id_user = $user");
		$j   = mysqli_fetch_array($tampil);
		if ($j['jawaban']=='A'){ 
		echo"<ul><h2><input type=radio name='jawaban' value='A' checked> A. $r[pilihan_a]</h2></ul>
		<ul><h2><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h2></ul>
		<ul><h2><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h2></ul>
		<ul><h2><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h2></ul>";
 		}
 		else if  ($j['jawaban']=='B'){ 
 		echo"<ul><h2><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='B' checked> B. $r[pilihan_b]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h2></ul>";
 		}
  		else if  ($j['jawaban']=='C'){ 
 		echo"<ul><h2><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='C' checked> C. $r[pilihan_c]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h2></ul>";
		 }
	 	else if  ($j['jawaban']=='D'){ 
 		echo"<ul><h2><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='D' checked> D. $r[pilihan_d]</h2></ul>";
 		}
 		else { 
 		echo"<ul><h2><input type=radio name='jawaban' value='A'> A. $r[pilihan_a]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='B'> B. $r[pilihan_b]</h2></ul>
 	  	<ul><h2><input type=radio name='jawaban' value='C'> C. $r[pilihan_c]</h2></ul>
	  	<ul><h2><input type=radio name='jawaban' value='D'> D. $r[pilihan_d]</h2></ul>";
 		}
		 echo"
		 </li>
		 <td colspan=2><button class='button button-green'>Simpan</button></form>";
		$no++;
		
		echo "</ul>";
		}
		echo "<p>&nbsp;</p>";
		
		$tampil2="select * from tabel_soal WHERE id_kategori =  $kategori";
		$hasil2=mysqli_query($konek,$tampil2);
		$jmldata=mysqli_num_rows($hasil2);
		$jmlhalaman=ceil($jmldata/$batas);
		//link ke halaman sebelumnya (previous)
		if($halaman > 1)
		{
		$previous=$halaman-1;
			echo "<a href=$_SERVER[PHP_SELF]?module=test&id_kategori=$kategori&halaman=$previous><button class='button button-blue'>Previous</button></a>";
		}

		//Toombol Next
		if($halaman < $jmlhalaman)
		{
			$next=$halaman+1;
			echo " | <a HREF=$_SERVER[PHP_SELF]?module=test&id_kategori=$kategori&halaman=$next><button class='button button-blue'>Next</button></a> ";
		}
}
        	  
//Tampikan Jawaban Yang Sudah Dijawab	 
	 
	 
	 echo"</div><table>
    <tr><th>No</th><th>Pertanyaan</th><th>Jawaban</th></tr>";
$hasil= mysqli_query($konek,"SELECT * FROM tabel_soal, jawaban WHERE jawaban.id_soal=tabel_soal.id_soal AND tabel_soal.id_kategori =  $kategori AND jawaban.id_user=$user ORDER BY tabel_soal.id_soal ASC");
$no=1; // Agar angka (penomoran) mengikuti paging
while($h = mysqli_fetch_array($hasil))
{	echo "<tr><td>$no</td>
		<td>$h[pertanyaan]</td>
		<td>$h[jawaban]</td></tr>";
  $no++;
  
  }
 

echo"<table></div>"; 
}
?>
