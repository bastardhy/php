<?php
require_once "simplify/lib/Simplify.php";

Simplify::$publicKey = 'PUBLIC_KEY_ANDA';
Simplify::$privateKey = 'PRIVATE_KEY_ANDA';
     
$payment = Simplify_Payment::createPayment(array(
	'amount' => '1000',
	'token' => '[TOKEN ID]',
	'description' => 'payment description',
	'reference' => '7a6ef6be31',
	'currency' => 'IDR'
));

if ($payment->paymentStatus == 'APPROVED') {
	echo "Payment approved\n";
}
?>