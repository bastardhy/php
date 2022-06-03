<?php
$to = "takehikoboyz@gmail.com";

$subject = "Test Email Template";
	
$content = 
		"
		<body style='margin:0; margin-top:30px; margin-bottom:30px; padding:0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #F4F5F7;'>
			<center>
			<table style='width: 600px; font-family: arial; font-size: 14px; background: #FFF; padding: 10px;'>
				<tr>
					<td>
						Ini adalah email template, bagus nggak?<br><br>
						<img src='http://agussaputra.com/images/books/php-gila-trik-dahsyat-menjadi-master-php.jpg' style='width: 80%;'><br><br><br>
						Best Regards,<br>
						agussaputra.com
					</td>
				</tr>
			</table><br>
			<p style='font-family: arial; font-size: 12px; border-bottom: 1px solid #DDD; padding-bottom: 10px;'>Copyright &copy; 2017 agussaputra.com. All Right Reserved.<br><br></p>
			<p style='font-family: arial; font-size: 12px;'>
				Mohon jangan balas email ini, karena email ini dikirim secara otomatis oleh sistem<br><br>
			</p>
			</center>
		</body>
		";
					
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			
// Additional headers
$headers .= 'From: agussaputra.com <no-reply@agussaputra.com>' . "\r\n";
	
mail($to, $subject, $content, $headers);
?>