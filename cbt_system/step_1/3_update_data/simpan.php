<?php
	include("koneksi.php"); //Koneksi Ke Database
	// Update Pertanyaan
	 $id    = $_POST['id']; 
	 $pertanyaan = $_POST['pertanyaan'];
	 $jawaban_a = $_POST['jawaban_a'];
	 $jawaban_b = $_POST['jawaban_b'];
	 $jawaban_c = $_POST['jawaban_c'];
	 $jawaban_d = $_POST['jawaban_d'];
	 $benar = $_POST['jawaban_benar'];
  	 $update = "UPDATE tabel_soal SET pertanyaan = '$pertanyaan',
									  pilihan_a = '$jawaban_a',
									  pilihan_b = '$jawaban_b',
									  pilihan_c = '$jawaban_c',
									  pilihan_d = '$jawaban_d',
									  jawaban_benar = '$benar'
             						  WHERE id_soal   = '$id'";
    mysqli_query($konek, $update);
	header('location: index.php');

?>
