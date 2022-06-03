<?php
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "origin=109&originType=city&destination=320&destinationType=subdistrict&weight=1000&courier=wahana",
	CURLOPT_HTTPHEADER => array(
		"content-type: application/x-www-form-urlencoded",
		"key: KEY_ANDA"
	),
));

$response = curl_exec($curl);
$asfaOngkir = json_decode($response);

echo "
<p>ORIGIN: CIREBON<br>
DESTINATION: DAYEUH KOLOT, KAB. BANDUNG</p>
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
					<td>".$cost2->cost[0]->value."</td>
					<td>".$cost2->cost[0]->etd."</td>
				</tr>";
	}	
}
echo "</table>";
?>