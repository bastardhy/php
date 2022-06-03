<?php
$connect = mysqli_connect("localhost","u6853386_asfa","asfa@word1","u6853386_agussaputra");

$queryMember = "SELECT email FROM as_member";
$sqlMember = mysqli_query($connect, $queryMember);

// subject email
$subject = "Halo PHP Email Massal";

// body text. untuk ganti baris harus gunakan pemisah \n
$message = "Hello World!\n\nIni adalah email massal.";

// untuk menambahkan email pengirim
$headers = "From: agussaputra.com <no-reply@agussaputra.com>" . "\r\n";

while ($dataMember = mysqli_fetch_array($sqlMember))
{

// proses kirim email
if ($dataMember['email'] != ''){
// email tujuan
$to = $dataMember['email'];
mail( $to, $subject, $message, $headers );
}
}
?>