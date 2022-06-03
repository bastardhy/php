<html>
<head>
	<title>Modul 4</title>
</head>
<body>

<?php

if (isset($_POST['buy']))
{
	echo 'Konfirmasi barang berhasil, kode : #'.$_POST['id'].' Harga $'.$_POST['price'];
}
else
{
?>
	Konfirmasi pembelian barang dengan kode #1234 <br />
	<form method="POST">
		<input type="hidden" name="id" value="1234" />
		<input type="hidden" name="price" value="100" />
		<input type="submit" name="buy" value="Confirm!" />
	</form>

<?php
}
?>

</body>
</html>