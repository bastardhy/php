<form id="form1" name="form1" method="post" action="det_pesan_add.php">
	<td>
	<table>
		<tr>
			<td width="120">no_det_pesan</td>
			<td width="350">
			<input name="no_det_pesan" type="text" id="no_det_pesan" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">no_pesan</td>
			<td width="350">
			<input name="no_pesan" type="no_pesan" id="no_pesan" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">kd_buku</td>
			<td width="350">
			<input name="kd_buku" type="kd_buku" id="kd_buku" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">total_pesan</td>
			<td width="350">
			<input name="total_pesan" type="total_pesan" id="total_pesan" size="40" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>
			<input type="submit" name="tambahLogin" value="Tambah" />
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

	frmvalidator.addValidation("no_det_pesan", "req", "nomor detail pesan masih kosong ");
	frmvalidator.addValidation("no_pesan", "req", "nomor pesan  masih kosong ");
	frmvalidator.addValidation("kd_buku", "req", "kode buku masih kosong ");
	frmvalidator.addValidation("total_pesan", "req", "total pesan masih kosong ");
	frmvalidator.addValidation("no_det_pesan", "alnum_s", "nomor detail tidak boleh ada spasi ");
	frmvalidator.addValidation("no_pesan", "alnum_s", "nomor pesan tidak boleh ada spasi");
	frmvalidator.addValidation("total_pesan", "minlen=1", "total pesan minimal 1 ");

</script>
