<?php
include ('inc/config.php');
$id = $_GET['id'];
//ambil data dari table 
$sql = "select * from penerbit where kd_penerbit='$id' ";
$result = mysql_query($sql) or die(mysql_error());
$rows=mysql_fetch_array($result);
?>
<h2>Change penerbit</h2>
<table>
	<form id="form1" name="form1" name="form2" method="post" action="penerbit_edit.php">

		<tr>
			<td width="120">kd penerbit</td>
			<td width="350">
			<input name="kd_penerbit" type="text" id="kd_penerbit" 
			value='<?=$rows['kd_penerbit']?>' size="10" readonly />
			</td>
		</tr>
			<tr>
			<td width="120">Nama Penerbit</td>
			<td width="350">
			<input name="nama" type="text" id="nama" 
			size="40"  value='<?=$rows['nama']?>' />
			</td>
			
		</tr>
			<tr>
			<td width="120">Alamat</td>
			<td width="350">
			<input name="alamat" type="text" id="alamat" 
			size="40"   value='<?=$rows['alamat']?>' />
			</td>
		</tr>
			<tr>
			<td width="120">Telepon</td>
			<td width="350">
			<input name="telepon" type="text" id="telepon" 
			size="15"   value='<?=$rows['telepon']?>' />
			</td>
		</tr>
			<tr>
			<td width="120">Email</td>
			<td width="350">
			<input name="email" type="text" id="email" 
			size="40"  value='<?=$rows['email']?>' />
			</td>
		</tr>
			<tr>
			<td width="120">Website</td>
			<td width="350">
			<input name="website" type="text" id="website" 
			size="40"   value='<?=$rows['website']?>'/>
			</td>
		</tr>

		<tr>
			<td>&nbsp;</td>

			<td>
			<input type="submit" name="update" value="update" />
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
