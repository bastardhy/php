<?php
include ('inc/config.php');
$id = $_GET['id'];
//ambil data dari table feedback
$sql = "select * from buku where kd_buku='$id' ";
$result = mysql_query($sql) or die(mysql_error());
?>
<h2>Change Bayar</h2>
<table>
	<form id="form1" name="form1"  method="post" action="bayar_edit.php">
		<?
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
		?>

		<td width="120">no_bayar</td>
		<td width="350"><?  echo $rows['no_bayar'];?></td>
		</tr>
		<input type="text" id="no_bayar" name="no_bayar" value=<? echo $rows['no_bayar'];?> />
		<tr>
			<td width="120">tgl_bayar</td>
			<td width="350">
			<input name="tgl_bayar" type="tgl_bayar" id="tgl_bayar" size="40"
			value=<? echo $rows['tgl_bayar'];?>>
			</td>
		</tr>
		<tr>
			<td width="120">no_pesan</td>
			<td width="350">
			<input name="no_pesan" type="no_pesan" id="no_pesan" size="40"
			value=<? echo $rows['no_pesan'];?>>
			</td>
		</tr>
		<tr>
			<td width="120">total_harga</td>
			<td width="350">
			<input name="total_harga" type="total_harga" id="total_harga" size="40"
			value=<? echo $rows['total_harga'];?>>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>

			<td>
			<input type="submit" name="submitUser" value="Submit" />
			<input type="reset" name="resetbtn" value="Reset" />
			</td>
		</tr>
		<?
		//loop while
		}
		?>
	</form>
</table>
<script language="javaScript" type="text/javascript"
xml:space="preserve">
//You should create the validator only after the definition of the HTML form
var frmvalidator  = new Validator("form1");
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("no_bayar","req","nomor bayar masih kosong ");
frmvalidator.addValidation("tgl_bayar","req","tanggal bayar  masih kosong ");
frmvalidator.addValidation("no_pesan","req","nomor pesan masih kosong ");
frmvalidator.addValidation("total_harga","req","total harga masih kosong ");
frmvalidator.addValidation("no_bayar","alnum_s","nomor bayar tidak boleh ada spasi ");
</script>
