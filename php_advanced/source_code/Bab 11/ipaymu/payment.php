<?php        
$url = 'https://my.ipaymu.com/payment.htm';  // URL Payment iPaymu           
$params = array(   // Prepare Parameters            
            'key'      => 'API_KEY_MERCHANT/PENJUAL', // API Key Merchant / Penjual
            'action'   => 'payment',
            'product'  => 'PHP Gila! Trik Dahsyat Menjadi Master PHP',
            'price'    => '73000', // Total Harga
            'quantity' => 1,
            'comments' => 'Buku PHP Gila merupakan seri buku Trik-trik rahasia master PHP, berisi trik pemrograman terkini yang paling banyak dicari oleh kalangan developer', // Optional
            'ureturn'  => 'http://www.website-anda.com/return.php?q=return',
            'unotify'  => 'http://www.website-anda.com/notify.php',
            'ucancel'  => 'http://www.website-anda.com/cancel.php',
 
            /* Parameter untuk pembayaran lain menggunakan PayPal
             * ----------------------------------------------- */
            'invoice_number' => uniqid('INV-'), // Optional
            //'paypal_email'   => 'takehikoboyz@gmail.com',
           // 'paypal_price'   => 1, // Total harga dalam kurs USD
            /* ----------------------------------------------- */
 
            'format'   => 'json' // Format: xml / json. Default: xml
        );
 
$params_string = http_build_query($params);
 
//open connection
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($params));
curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 
//execute post
$request = curl_exec($ch);
 
if ( $request === false ) 
{
    echo 'Curl Error: ' . curl_error($ch);
} 
else {
	$result = json_decode($request, true);
	
	if( isset($result['url']) )
		header('Location: '. $result['url']);
	else {
		echo "Request Error ". $result['Status'] .": ". $result['Keterangan'];
	}
}
 
//close connection
curl_close($ch);
?>