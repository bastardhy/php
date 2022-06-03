<?php
include ('inc/config.php');
$id = $_GET['id'];
//ambil data dari table feedback
$sql = "select * from biaya_kirim where id_kota='$id' ";
$result = mysql_query($sql) or die(mysql_error());
?>
<h2>Change Biaya Kirim</h2>
<table>
	<form id="form1" name="form1" name="form2" method="post" action="biaya_edit.php">
		<?
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
		?>

		<td width="120">id_kota</td>
		<td width="350"><?  echo $rows['id_kota'];?></td>
		</tr>
		<input type="hidden" id="id_kota" name="id_kota" value=<? echo $rows['id_kota'];?> />
		<tr>
			<td width="120">nama_kota</td>
			<td width="350">
			<input name="nama_kota" type="nama_kota" id="nama_kota" size="40"
			value=<? echo $rows['nama_kota'];?>>
			</td>
		</tr>
		<tr>
			<td width="120">biaya</td>
			<td width="350">
			<input name="biaya" type="biaya" id="biaya" size="40"
			value=<? echo $rows['biaya'];?>>
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

frmvalidator.addValidation("id_kota","req","id kota masih kosong ");
frmvalidator.addValidation("Nama_kota","req","Nama_kota  masih kosong ");
frmvalidator.addValidation("biaya","req","biaya masih kosong ");
</script>
