<title>Paypal Payment Gateway</title>
<?php
// Include Koneksi
include "koneksi.php";

// Set useful variables for paypal form
$paypalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr"; //Test PayPal API URL
$paypalID = "takehikoboyz-facilitator-1@gmail.com"; //Business Email

// Fetch products from the database
$queryProduct = "SELECT * FROM as_products";
$sqlProduct = mysqli_query($connect, $queryProduct);

echo "<table cellpadding='5' cellspacing='5'>";
while($dataProduct = mysqli_fetch_array($sqlProduct))
{
?>
	<tr>
		<td><img src="images/<?php echo $dataProduct['image']; ?>" width="100"></td>
		<td>
			Name: <?php echo $dataProduct['name']; ?><br>
			Price: <?php echo $dataProduct['price']; ?><br><br>
			<form action="<?php echo $paypalURL; ?>" method="POST">
				<!-- Identify your business so that you can collect the payments. -->
				<input type="hidden" name="business" value="<?php echo $paypalID; ?>">
				
				<!-- Specify a Buy Now button. -->
				<input type="hidden" name="cmd" value="_xclick">
				
				<!-- Specify details about the item that buyers will purchase. -->
				<input type="hidden" name="item_name" value="<?php echo $dataProduct['name']; ?>">
				<input type="hidden" name="item_number" value="<?php echo $dataProduct['id']; ?>">
				<input type="hidden" name="amount" value="<?php echo $dataProduct['price']; ?>">
				<input type="hidden" name="currency_code" value="USD">
				
				<!-- Specify URLs -->
				<input type='hidden' name='cancel_return' value='http://localhost/source_code/Bab 11/cancel.php'>
				<input type='hidden' name='return' value='http://localhost/source_code/Bab 11/success.php'>
				
				<!-- Display the payment button. -->
				<input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
				<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
			</form>
		</td>
	</tr>
<?php 
} 

echo "</table>";
?>