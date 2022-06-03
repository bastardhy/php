<?php
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://pro.rajaongkir.com/api/province",
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
$asfaProvince = json_decode($response);

echo "<select>";
foreach($asfaProvince->rajaongkir->results as $province)
{
	echo "<option value='$province->province_id'>$province->province</option>";
}
echo "</select>";
?>