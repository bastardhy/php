<form id="form1" name="form1" method="post" action="biaya_add.php">
	<td>
	<table>
	
		<tr>
			<td width="120">nama_kota</td>
			<td width="350">
			<input name="nama_kota" type="nama_kota" id="nama_kota" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">biaya</td>
			<td width="350">
			<input name="biaya" type="biaya" id="biaya" size="40" />
			</td>
		</tr>
		<tr>
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

	
	frmvalidator.addValidation("nama_kota", "req", "nama kota  masih kosong ");
	frmvalidator.addValidation("biaya", "req", "biaya masih kosong ");
	

</script>
