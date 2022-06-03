<?php
include "qrlib/qrlib.php";

// Bikin qr code dengan email takehikoboyz@gmail.com
$nama = "takehikoboyz@gmail.com";
QRcode::png($nama);
?>