<?php
include "debug.php";

$apiKey = "API_KEY_ANDA";
$idTrx = "";

$transaksi = json_decode(file_get_contents("https://my.ipaymu.com/api/CekTransaksi.php?key=".$apiKey."&id=".$idTrx."&format=json"));

echo web_debug($transaksi);
?>