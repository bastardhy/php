<?php
	include("koneksi.php"); //Koneksi Ke Database
	// Input Pertanyaan
    $input = "INSERT INTO tabel_soal(pertanyaan,
                                    pilihan_a,
									pilihan_b,
									pilihan_c,
									pilihan_d,
									jawaban_benar) 
                            VALUES('$_POST[pertanyaan]',
                                   '$_POST[jawaban_a]',
								   '$_POST[jawaban_b]',
								   '$_POST[jawaban_c]',
								   '$_POST[jawaban_d]',
								   '$_POST[jawaban_benar]')";
	mysqli_query($konek, $input);
	header('location: index.php');

?>
