<?php
$receipt = "15366682930";
$courier = "pos";

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://pro.rajaongkir.com/api/waybill",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "waybill=$receipt&courier=$courier",
	CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		"key: KEY_ANDA"
	),
));

$response = curl_exec($curl);
$responseTrack = json_decode($response);

echo "<h4>Kurir : $courier<br>No Resi : $receipt</h4>
		<table border='1' cellpadding='5' cellspacing='0'>
		<tr>
			<th>Manifest Date</th>
			<th>Manifest Time</th>
			<th>Description</th>
		</tr>
	";
foreach($responseTrack->rajaongkir->result->manifest as $val)
{
	echo "	<tr>
			<td>$val->manifest_date</td>
			<td>$val->manifest_time</td>
			<td>$val->manifest_description</td>
		</tr>";
}
?>