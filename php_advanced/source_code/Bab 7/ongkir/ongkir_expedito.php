<?php
include "debug.php";
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://pro.rajaongkir.com/api/v2/internationalCost",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "origin=152&destination=108&weight=1400&courier=expedito",
	CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		"key: KEY_ANDA"
	),
));

$response = curl_exec($curl);
$asfaOngkir = json_decode($response);
echo web_debug($asfaOngkir);
echo "
<p>ORIGIN: JAKARTA<br>
DESTINATION: MALAYSIA</p>
<table border='1' cellpadding='5' cellspacing='0'>
		<tr>
			<th>Kurir</th>
			<th>Layanan</th>
			<th>Biaya Kirim</th>
			<th>ETD</th>
		</tr>
";
foreach($asfaOngkir->rajaongkir->results as $ongkir)
{
	
	foreach ($ongkir->costs as $cost2)
	{
		
		echo "	<tr>
					<td>".$ongkir->code."</td>
					<td>".$cost2->service."</td>
					<td>".$cost2->currency." ".$cost2->cost."</td>
					<td>".$cost2->etd."</td>
				</tr>";
	}	
}
echo "</table>";
?>