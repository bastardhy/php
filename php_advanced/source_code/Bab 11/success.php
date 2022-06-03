<?php
include "koneksi.php";

// Get payment information from PayPal
$item_number = $_GET['item_number']; 
$txn_id = $_GET['tx'];
$payment_gross = $_GET['amt'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];

// Get product price from database
$queryProduct = "SELECT price FROM as_products WHERE id = '$item_number'";
$sqlProduct = mysqli_query($connect, $queryProduct);
$dataProduct = mysqli_fetch_array($sqlProduct);

$productPrice = $dataProduct['price'];

if(!empty($txn_id) && $payment_gross == $productPrice){
    	
    // Check if payment data exists with the same TXN ID.
    $queryPrevPayment = "SELECT payment_id FROM as_payments WHERE txn_id = '$txn_id'";
	$sqlPrevPayment = mysqli_query($connect, $queryPrevPayment);
	$dataPrevPayment = mysqli_fetch_array($sqlPrevPayment);
	$numsPrevPayment = mysqli_num_rows($sqlPrevPayment);
	
	$prevPaymentResult = $db->query("SELECT payment_id FROM payments WHERE txn_id = '".$txn_id."'");
	
	if($numsPrevPayment > 0)
	{
		$paymentRow = $prevPaymentResult->fetch_assoc();
		$last_insert_id = $dataPrevPayment['payment_id'];
	}
	else
	{
		// Insert tansaction data into the database
		$queryInsert = "INSERT INTO as_payments (	item_number,
													txn_id,
													payment_gross,
													currency_code,
													payment_status)
											VALUES(	'$item_number',
													'$txn_id',
													'$payment_gross',
													'$currency_code',
													'$payment_status')";
		mysqli_query($connect, $queryInsert);
		
		$last_insert_id = mysqli_insert_id($connect);
	}
?>
	<h1>Your payment has been successful.</h1>
	<h1>Your Payment ID - <?php echo $last_insert_id; ?></h1>
<?php 
}
else{ 
?>
	<h1>Your payment has failed.</h1>
<?php 
} 
?>