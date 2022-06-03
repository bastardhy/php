	<form id="form1" name="form1" method="post" action="penerbit_add.php">
	
		<table>
			<tr>
				<td width="120">kd penerbit</td>
				<td width="350">
				<input name="kd_penerbit" type="text" id="kd_penerbit" 
				value='<?=kode_penerbit() ?>' size="10" />
				</td>
			</tr>
				<tr>
				<td width="120">Nama Penerbit</td>
				<td width="350">
				<input name="nama" type="text" id="nama" 
				size="40" />
				</td>
				
			</tr>
				<tr>
				<td width="120">Alamat</td>
				<td width="350">
				<input name="alamat" type="text" id="alamat" 
				size="40" />
				</td>
			</tr>
				<tr>
				<td width="120">Telepon</td>
				<td width="350">
				<input name="telepon" type="text" id="telepon" 
				size="15" />
				</td>
			</tr>
				<tr>
				<td width="120">Email</td>
				<td width="350">
				<input name="email" type="text" id="email" 
				size="40" />
				</td>
			</tr>
				<tr>
				<td width="120">Website</td>
				<td width="350">
				<input name="website" type="text" id="website" 
				size="40" />
				</td>
			</tr>
	
			<tr>
				<td>&nbsp;</td>
	
				<td>
				<input type="submit" name="Tambah" value="Tambah" />
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
	
	frmvalidator.addValidation("kd_penerbit","req","kode penerbit masih kosong ");
	
		</script>
