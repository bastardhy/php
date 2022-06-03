<form id="form1" name="form1" method="post" action="kategori_add.php">
	<td>
	<table>
		<tr>
			<td width="120">kd_kategori</td>
			<td width="350">
			<input name="kd_kategori" type="text" id="kd_kategori" 
			value=<?=kode_kategori()?> size="10" />
			</td>
		</tr>
		<tr>
			<td width="120">nama_kategori</td>
			<td width="350">
			<input name="nama_kategori" type="nama_kategori" id="nama_kategori" size="40" />
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

	frmvalidator.addValidation("kd_kategori", "req", "kode jenis masih kosong ");
	frmvalidator.addValidation("nama_kategori", "req", "nama jenis  masih kosong ");

	frmvalidator.addValidation("kd_kategori", "alnum_s", "kode jenis tidak boleh ada spasi ");
	frmvalidator.addValidation("nama_kategori", "maxlen=15", "nama jenis  tidak boleh lebih dari 7 karakter ");

</script>
