<?php
/*
* Rajaongkir cek harga
* Code by @xyussanx :: idmore
*/
class IdmoreRO{
	public function __construct()
	{
	}
	
	// set menampilkan data provinsi
	public function setShowProvince($province)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://pro.rajaongkir.com/api/province?id=$province",
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
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} 
		else {
			return $response;
		}
	}
	
	// set menampilkan data kota / kabupaten
	public function setShowCity($province,$city)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://pro.rajaongkir.com/api/city?id=$city&province=$province",
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
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} 
		else {
			return $response;
		}
	}
	
	// set menampilkan data kecamatan
	public function setShowDistrict($district,$province,$city)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://pro.rajaongkir.com/api/subdistrict?id=$district&province=$province&city=$city",
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
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} 
		else {
			return $response;
		}
	}

	//menampilkan data provinsi
	public function showProvince()
	{
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
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			$result = 'error';
			return 'error';
		} 
		else {
			return $response;
		}
	}

	//menampilkan data kabupaten/kota berdasarkan id provinsi
	public function showCity($province)
	{
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://pro.rajaongkir.com/api/city?province=$province",
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
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			$result = 'error';
			return 'error';
		} 
		else {
			echo $response;
		}
	}
	
	// menampilkan data kecamatan
	public function showDistrict($city)
	{
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://pro.rajaongkir.com/api/subdistrict?city=$city",
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
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			$result = 'error';
			return 'error';
		} 
		else {
			echo $response;
		}
	}

	//hitung ongkir
	public function hitungOngkir($origin,$destination,$weight,$courier)
	{
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$origin&originType=city&destination=$destination&destinationType=subdistrict&weight=$weight&courier=$courier",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: KEY_ANDA"
			),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			echo "cURL Error #:" . $err;
		} 
		else {
			echo $response;
		}
	}
	
	//hitung ongkir
	public function showOngkir($origin,$destination,$weight,$courier,$service)
	{
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$origin&originType=city&destination=$destination&destinationType=subdistrict&weight=$weight&courier=$courier&service=$service",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: KEY_ANDA"
			),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
			echo "cURL Error #:" . $err;
		} 
		else {
			echo $response;
		}
	}
}
?>