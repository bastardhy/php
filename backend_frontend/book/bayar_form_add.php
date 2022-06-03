<form id="form1" name="form1" method="post" action="bayar_add.php">
	<td>
	<table>
	
		<tr>
			<td width="120">tanggal</td>
			
			<td width="350">
			<input name="tanggal" type="text" id="tanggal" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">kd_pesan</td>
			
			<td width="350">
			<input name="kd_pesan" type="text" id="kd_pesan" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">total_bayar</td>
			
			<td width="350">
			<input name="total_bayar" type="text" id="total_bayar" size="40" />
			</td>
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
	</table>
</form>
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
<?php
if (isset($_GET['status'])) {
	if ($_GET['status'] == 0) {
		echo " Konfirmasi pembayaran berhasil";
	} else {
		echo "konfirmasi Pembayaran gagal, silahkan ulangi lagi";
	}
}
?>