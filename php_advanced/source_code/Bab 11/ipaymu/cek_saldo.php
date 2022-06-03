<?php
$apiKey = "API_KEY_ANDA";

$balance = json_decode(file_get_contents("https://my.ipaymu.com/api/CekSaldo.php?key=".$apiKey."&format=json"));

echo $balance->Username."<br>Saldo : ".$balance->Saldo;
?>