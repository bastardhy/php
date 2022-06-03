<form id="form1" name="form1" method="post" action="pengelola_add.php">
	<td>
	<table>
		<tr>
			<td width="120">username</td>
			<td width="350">
			<input name="username" type="text" id="username" size="40" />
			</td>
		</tr>
		<tr>
			<td width="120">password</td>
			<td width="350">
			<input name="password" type="password" id="password" size="40" />
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		
			<td>
			<input type="submit" name="tambahPengelola" value="Tambah" />
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

	frmvalidator.addValidation("username", "req", "username masih kosong ");
	frmvalidator.addValidation("password", "req", "password  masih kosong ");
	frmvalidator.addValidation("username", "maxlen=20", " username tidak boleh lebih dari 20 ");
	frmvalidator.addValidation("password", "alnum_s", "password  tidak boleh ada spasi ");

</script>
