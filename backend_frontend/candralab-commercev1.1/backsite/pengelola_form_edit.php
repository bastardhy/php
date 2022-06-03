<?php
include ('inc/config.php');
$id = $_GET['id'];
//ambil data dari table feedback
$sql = "select * from pengelola where username='$id' ";
$result = mysql_query($sql) or die(mysql_error());
?>
<h2>Change password</h2>
<table>
	<form id="form1" name="form1" method="post" action="pengelola_edit.php">
		<?
//proses menampilkan data
while($rows=mysql_fetch_array($result)){
		?>

		<td width="120">username</td>
		<td width="350"><?  echo $rows['username'];?></td>
		<input type="hidden" id="username" name="username" value=<? echo $rows['username'];?> />
		<!--<input type="text" id="username" name="username" value=<? echo $rows['username'];?> /> --></td>
		</tr>
		<tr>
			<td width="120">password</td>
			<td width="350">
			<input name="password" type="password" id="password" size="40" value=<? echo $rows['password'];?> />
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

frmvalidator.addValidation("username","req","username masih kosong ");
frmvalidator.addValidation("password","req","password  masih kosong ");
frmvalidator.addValidation("username","maxlen=20"," username tidak boleh lebih dari 20 ");
frmvalidator.addValidation("password","alnum_s","password  tidak boleh ada spasi ");
</script>
