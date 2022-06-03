<?php
include('inc/config.php');
$id=$_GET['id'];
//ambil data dari table feedback
$sql="select * from pemesan where kd_pemesan='$id' ";
$result=mysql_query($sql) or die(mysql_error());


?>
<h2>Change Pemesan</h2>
<table>
<form id="form1" name="form1" name="form2" method="post" action="bayar_edit.php">
 <?
//proses menampilkan data 
while($rows=mysql_fetch_array($result)){
?>

<td width="120">kd_pemesan</td>

<td width="350"><? echo $rows['kd_pemesan'];?> </td>
</tr>
<input type="hidden" id="kd_pemesan" name="kd_pemesan" value=<? echo $rows['kd_pemesan'];?> />

<tr>
<td width="120">Nama</td>

<td width="350"><input name="Nama" type="Nama" id="Nama" size="40" 
	 value=<? echo $rows['Nama'];?>></td>
</tr>

<tr>
<td width="120">Alamat</td>

<td width="350"><input name="Alamat" type="Alamat" id="Alamat" size="40" 
	 value=<? echo $rows['Alamat'];?>></td>
</tr>

<tr>
<td width="120">kd_pos</td>

<td width="350"><input name="kd_pos" type="kd_pos" id="kd_pos" size="40" 
	 value=<? echo $rows['kd_pos'];?>></td>
</tr>

<tr>
<td width="120">No_telp</td>

<td width="350"><input name="No_telp" type="No_telp" id="No_telp" size="40" 
	 value=<? echo $rows['No_telp'];?>></td>
</tr>

<tr>
<td width="120">Email</td>

<td width="350"><input name="Email" type="Email" id="Email" size="40" 
	 value=<? echo $rows['Email'];?>></td>
</tr>


<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="submitUser" value="Submit" /> <input type="reset" name="resetbtn" value="Reset" /></td>
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
 
 frmvalidator.addValidation("kd_pemesan","req","kode pemesan masih kosong ");
  frmvalidator.addValidation("Nama","req","nama  masih kosong ");
   frmvalidator.addValidation("Alamat","req","alamat masih kosong ");
      frmvalidator.addValidation("kd_pos","req","kode pos masih kosong ");
        frmvalidator.addValidation("No_telp","req","no. telp masih kosong");
              frmvalidator.addValidation("email","req","email masih kosong");
             frmvalidator.addValidation("kd_pemesan","alnum_s ","kode pemesan tidak boleh ada spasi ");
              frmvalidator.addValidation("Alamat","minlen=10","alamat kurang lengkap ");
                    frmvalidator.addValidation("kd_pos","num","input harus angka ");
               frmvalidator.addValidation("No_telp","num","input harus angka ");
              frmvalidator.addValidation("email","maxlen=50","maksimal panjang email 50 karakter");
</script>
