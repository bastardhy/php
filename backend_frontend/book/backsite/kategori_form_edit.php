<?php
include ('inc/config.php');
$id = $_GET['id'];
//ambil data dari table feedback
$sql = "select * from kategori where kd_kategori='$id' ";
$result = mysql_query($sql) or die(mysql_error());
?>
<h2>Change kategori buku</h2>
<table>
	<form id="form1" name="form1" method="post" action="kategori_edit.php">
		<?
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
		?>

		<td width="120">kd_kategori</td>
		<td width="350"><?  echo $rows['kd_kategori'];?></td>
		<input type="hidden" id="kd_kategori" name="kd_kategori" value=<? echo $rows['kd_kategori'];?> />
		</td>
		</tr> <td width="120">nama_kategori</td>
		<td width="350">
		<input name="nama_kategori" type="nama_kategori" id="nama_kategori" size="40"
		value='<? echo $rows['nama_kategori'];?>'>
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
		<tr>
			<td colspan='2'><div id="form1_errorloc" style="color:red"></div></td>
		</tr>
	</form>
</table>
<script language="javaScript" type="text/javascript"
xml:space="preserve">
//You should create the validator only after the definition of the HTML form
var frmvalidator  = new Validator("form1");
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("kd_kategori","req","kode kategori masih kosong ");
frmvalidator.addValidation("nama_kategori","req","nama kategori  masih kosong ");

frmvalidator.addValidation("kd_kategori","alnum_s","kode kategori tidak boleh ada spasi ");
frmvalidator.addValidation("nama_kategori","minlen=1","nama kategori  tidak boleh lebih dari 1 karakter ");
</script>
