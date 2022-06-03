<?php
include ('inc/config.php');
$id = $_GET['id'];
//ambil data dari table feedback
$sql = "select * from buku where kd_buku='$id' ";
$result = mysql_query($sql) or die(mysql_error());
?>
<h2>Change buku</h2>
<table>
	<form id="form1" name="form1" name="form2" method="post" action="buku_edit.php">
		<?
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
		?>

		<td width="120">kd_buku</td>
		<td width="350"><?  echo $rows['kd_buku'];?></td>
		</tr>
		<input type="hidden" id="kd_buku" name="kd_buku" value=<? echo $rows['kd_buku'];?> />
		<tr>
			<td width="120">kd_kategori</td>
			<td width="350">
			<input name="kd_kategori" type="kd_kategori" id="kd_kategori" size="40"
			value=<? echo $rows['kd_kategori'];?>>
			</td>
		</tr>
		<tr>
			<td width="120">ukuran</td>
			<td width="350">
			<input name="ukuran" type="ukuran" id="ukuran" size="40"
			value=<? echo $rows['ukuran'];?>>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
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
	var frmvalidator = new Validator("form1");
	frmvalidator.EnableOnPageErrorDisplaySingleBox();
	frmvalidator.EnableMsgsTogether();

	frmvalidator.addValidation("kd_buku", "req", "kode buku masih kosong ");
	frmvalidator.addValidation("kd_kategori", "req", "kode jenis  masih kosong ");
	frmvalidator.addValidation("ukuran", "req", "ukuran masih kosong ");
	frmvalidator.addValidation("ukuran", "num", "input harus angka ");
	frmvalidator.addValidation("ukuran", "lt=42", "input harus angka harus <43");
	frmvalidator.addValidation("ukuran", "gt=35", "input harus angka harus >35");
	/*frmvalidator.addValidation("username","maxlen=20"," nama tidak boleh lebih dari 20 ");
	 frmvalidator.addValidation("email","maxlen=50");
	 frmvalidator.addValidation("email","req");
	 frmvalidator.addValidation("email","email");

	 frmvalidator.addValidation("komentar","req","komentar masih kosong");*/
</script>
