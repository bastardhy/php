<?php
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://pro.rajaongkir.com/api/city?province=6",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
		"key: KEY_ANDA"
	),
));

$response = curl_exec($curl);
$asfaCity = json_decode($response);

echo "<select>";
foreach($asfaCity->rajaongkir->results as $city)
{
	echo "<option value='$city->city_id'>$city->city_name</option>";
}
echo "</select>";
?>