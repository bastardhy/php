<?php
$to = "takehikoboyz@gmail.com";

$subject = "Test Email Gambar / HTML";
	
$content = "Yes, ini adalah email gambar / html <br><br>
	<img src='http://agussaputra.com/images/books/php-gila-trik-dahsyat-menjadi-master-php.jpg' style='width: 500px;'>
	";
					
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
// Additional headers
$headers .= 'From: agussaputra.com <no-reply@agussaputra.com>' . "\r\n";
	
mail($to, $subject, $content, $headers);
?>