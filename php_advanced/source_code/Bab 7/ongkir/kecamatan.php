<?php
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://pro.rajaongkir.com/api/subdistrict?city=153",
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

$asfaDistrict = json_decode($response);

echo "<select>";
foreach($asfaDistrict->rajaongkir->results as $district)
{
	echo "<option value='$district->subdistrict_id'>$district->subdistrict_name</option>";
}
echo "</select>";
?>