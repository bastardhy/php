<?php
include ('inc/config.php');
$id = $_GET['id'];
//ambil data dari table feedback
$sql = "select * from det_pesan where no_det_pesan='$id' ";
$result = mysql_query($sql) or die(mysql_error());
?>
<h2>Change Detai Pesan</h2>
<table>
	<form id="form1" name="form1" name="form2" method="post" action="det_pesan_edit.php">
		<?
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
		?>

		<td width="120">no_det_pesan</td>
		<td width="350"><?  echo $rows['no_det_pesan'];?></td>
		</tr>
		<input type="hidden" id="no_det_pesan" name="no_det_pesan" value=<? echo $rows['no_det_pesan'];?> />
		<tr>
			<td width="120">no_pesan</td>
			<td width="350">
			<input name="no_pesan" type="no_pesan" id="no_pesan" size="40"
			value=<? echo $rows['no_pesan'];?>>
			</td>
		</tr>
		<tr>
			<td width="120">kd_buku</td>
			<td width="350">
			<input name="kd_buku" type="kd_buku" id="kd_buku" size="40"
			value=<? echo $rows['kd_buku'];?>>
			</td>
		</tr>
		<tr>
			<td width="120">total_pesan</td>
			<td width="350">
			<input name="total_pesan" type="total_pesan" id="total_pesan" size="40"
			value=<? echo $rows['total_pesan'];?>>
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

frmvalidator.addValidation("no_det_pesan","req","nomor detail pesan masih kosong ");
frmvalidator.addValidation("no_pesan","req","nomor pesan  masih kosong ");
frmvalidator.addValidation("kd_buku","req","kode buku masih kosong ");
frmvalidator.addValidation("total_pesan","req","total pesan masih kosong ");
frmvalidator.addValidation("no_det_pesan","alnum_s","nomor detail tidak boleh ada spasi ");
frmvalidator.addValidation("no_pesan","alnum_s","nomor pesan tidak boleh ada spasi");
frmvalidator.addValidation("total_pesan","minlen=1","total pesan minimal 1 ");</script>
