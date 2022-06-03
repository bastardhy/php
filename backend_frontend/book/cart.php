<?
// Include MySQL class
require_once ('inc/mysql.class.php');
// Include database connection
require_once ('inc/global.inc.php');
// Include functions
require_once ('inc/functions.inc.php');
// Start the session
session_start();

// Process actions
$cart = $_SESSION['cart'];
$action = $_GET['action'];
switch ($action) {
	case 'add' :
		if ($cart) {
			$cart .= ',' . $_GET['id'];
		} else {
			$cart = $_GET['id'];
		}
		break;
	case 'delete' :
		if ($cart) {
			$items = explode(',', $cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['id'] != $item) {
					if ($newcart != '') {
						$newcart .= ',' . $item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update' :
		if ($cart) {
			$newcart = '';
			foreach ($_POST as $key => $value) {
				if (stristr($key, 'qty')) {
					$id = str_replace('qty', '', $key);
					$items = ($newcart != '') ? explode(',', $newcart) : explode(',', $cart);
					$newcart = '';
					foreach ($items as $item) {
						if ($id != $item) {
							if ($newcart != '') {
								$newcart .= ',' . $item;
							} else {
								$newcart = $item;
							}
						}
					}
					for ($i = 1; $i <= $value; $i++) {
						if ($newcart != '') {
							$newcart .= ',' . $id;
						} else {
							$newcart = $id;
						}
					}
				}
			}
		}

		$cart = $newcart;
		break;
}
$_SESSION['cart'] = $cart;
?>

<div id="shoppingcart">
	<h1>Keranjang belanja anda</h1>
	<?php
	echo writeShoppingCart();
	?>
</div>
<div id="contents">
	<h3>Cek keranjang belanja</h3>
	<?php
	echo showCart();
	?>

	<h1>Form Pengiriman barang</h1>
	<a href="index.php?page=cart&action=finish&kirim=true">Isi Data pembeli</a>
	<?php
if(isset($_GET['kirim'])){
	?>
	<form id="form1" name="form1" method="post" action="pemesan_add.php">
		<td>
		<table>
			<!--<tr>
			<td width="120">kd_pemesan</td>

			<td width="350"><input name="kd_pemesan" type="text" id="kd_pemesan" size="40" /></td>
			</tr>-->
			<tr>
				<td width="120">Nama</td>
				<td width="350">
				<input name="Nama" type="Nama" id="Nama" size="40" />
				</td>
			</tr>
			<tr>
				<td width="120">Alamat</td>
				<td width="350">
				<input name="Alamat" type="Alamat" id="Alamat" size="40" />
				</td>
			</tr>
			<tr>
				<td width="120">kd_pos</td>
				<td width="350">
				<input name="kd_pos" type="kd_pos" id="kd_pos" size="40" />
				</td>
			</tr>
			<tr>
				<td width="120">No_telp</td>
				<td width="350">
				<input name="No_telp" type="No_telp" id="No_telp" size="40" />
				</td>
			</tr>
			<tr>
				<td width="120">Email</td>
				<td width="350">
				<input name="Email" type="Email" id="Email" size="40" />
				</td>
			</tr>
			<?php?>
			<tr>
				<td width="120">Kota</td>
				<td width="350">
				<select name='id_kota' id='id_kota'>
					<?
$get_kota=mysql_query('select * from biaya_kirim order by nama_kota');
while ($rows=mysql_fetch_array($get_kota)){
					?>
					<option value="<?=$rows['id_kota']?>"><?=$rows['nama_kota']
						?></option>
					<?
					}//end while
					?>
				</select></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			
				<td>
				<input type="submit" name="tambah" value="Tambah" />
				<input type="reset" name="resetbtn" value="Reset" />
				</td>
			</tr>
			<tr>
				<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
			</tr>
		</table></td>
	</form>
	<script language="javaScript" type="text/javascript"
	xml:space="preserve">
		//You should create the validator only after the definition of the HTML form
		var frmvalidator = new Validator("form1");
		frmvalidator.EnableOnPageErrorDisplaySingleBox();
		frmvalidator.EnableMsgsTogether();

		frmvalidator.addValidation("kd_pemesan", "req", "kode pemesan masih kosong ");
		frmvalidator.addValidation("Nama", "req", "nama  masih kosong ");
		frmvalidator.addValidation("Alamat", "req", "alamat masih kosong ");
		frmvalidator.addValidation("kd_pos", "req", "kode pos masih kosong ");
		frmvalidator.addValidation("No_telp", "req", "no. telp masih kosong");
		frmvalidator.addValidation("email", "req", "email masih kosong");
		frmvalidator.addValidation("kd_pemesan", "alnum_s ", "kode pemesan tidak boleh ada spasi ");
		frmvalidator.addValidation("Alamat", "minlen=10", "alamat kurang lengkap ");
		frmvalidator.addValidation("kd_pos", "num", "input harus angka ");
		frmvalidator.addValidation("No_telp", "num", "input harus angka ");
		frmvalidator.addValidation("email", "maxlen=50", "maksimal panjang email 50 karakter");

	</script>
	<?
}
	?>
</div>
