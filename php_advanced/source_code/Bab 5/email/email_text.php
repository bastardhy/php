<?php
// email tujuan
$to = "takehikoboyz@gmail.com";

// subject email
$subject = "Halo PHP Email Text";

// body text. untuk ganti baris harus gunakan pemisah \n
$message = "Hello World!\n\nThis is my first mail.";

// untuk menambahkan email pengirim
$headers = "From: agussaputra.com <no-reply@agussaputra.com>" . "\r\n";

// proses kirim email
mail( $to, $subject, $message, $headers );
?>