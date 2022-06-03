<?php
$apiKey = "API_KEY_ANDA";
$user = "takehikoboyz@gmail.com";

$cek = json_decode(file_get_contents("https://my.ipaymu.com/api/CekStatus.php?key=".$apiKey."&user=".$user."&format=json"));

echo "Username : ".$cek->Username."<br>Status User : ".$cek->StatusUser;
?>