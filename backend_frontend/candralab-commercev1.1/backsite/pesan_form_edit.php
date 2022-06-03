<?php
include ('inc/config.php');
$id = $_GET['id'];
//ambil data dari table feedback
$sql = "select * from pesan where no_pesan='$id' ";
$result = mysql_query($sql) or die(mysql_error());
?>
<h2>Change Pesan</h2>
<table>
	<form id="form1" name="form1" name="form2" method="post" action="buku_edit.php">
		<?
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
		?>

		<td width="120">no_pesan</td>
		<td width="350"><?  echo $rows['no_pesan'];?></td>
		</tr>
		<input type="hidden" id="no_pesan" name="no_pesan" value=<? echo $rows['no_pesan'];?> />
		<tr>
			<td width="120">tgl_pesan</td>
			<td width="350">
			<input name="tgl_pesan" type="tgl_pesan" id="tgl_pesan" size="40"
			value=<? echo $rows['tgl_pesan'];?>>
			</td>
		</tr>
		<tr>
			<td width="120">kd_pemesan</td>
			<td width="350">
			<input name="kd_pemesan" type="kd_pemesan" id="kd_pemesan" size="40"
			value=<? echo $rows['kd_pemesan'];?>>
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
var frmvalidator  = new Validator("form1");
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("no_pesan","req","nomor pesan masih kosong ");
frmvalidator.addValidation("kd_kategori","req","kode jenis  masih kosong ");
frmvalidator.addValidation("kd_pemesan","req","kode pemesanan masih kosong ");</script>
