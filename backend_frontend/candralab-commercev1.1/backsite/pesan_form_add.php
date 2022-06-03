<form id="form1" name="form1" method="post" action="pesan_add.php">
	<td>
	<table>
		<tr>
			<td width="120">no_pesan</td>
			<td width="350">
			<input name="no_pesan" type="text" id="no_pesan" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">tgl_pesan</td>
			<td width="350">
			<input name="tgl_pesan" type="tgl_pesan" id="tgl_pesan" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">kd_pemesan</td>
			<td width="350">
			<input name="kd_pemesan" type="kd_pemesan" id="kd_pemesan" size="40" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			
			<td>
			<input class='button' type="submit" name="tambahLogin" value="Tambah" />
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

	frmvalidator.addValidation("no_pesan", "req", "nomor pesan masih kosong ");
	frmvalidator.addValidation("kd_kategori", "req", "kode jenis  masih kosong ");
	frmvalidator.addValidation("kd_pemesan", "req", "kode pemesanan masih kosong ");

</script>
