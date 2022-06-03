<form id="form1" name="form1" method="post" action="pemesan_add.php">
<td>
<table  border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="120">kd_pemesan</td>

<td width="350"><input name="kd_pemesan" type="text" id="kd_pemesan" size="40" /></td>
</tr>
<tr>
<td width="120">Nama</td>

<td width="350"><input name="Nama" type="Nama" id="Nama" size="40" /></td>
</tr>

<tr>
<td width="120">Alamat</td>

<td width="350"><input name="Alamat" type="Alamat" id="Alamat" size="40" /></td>
</tr>

<tr>
<td width="120">kd_pos</td>

<td width="350"><input name="kd_pos" type="kd_pos" id="kd_pos" size="40" /></td>
</tr>

<tr>
<td width="120">No_telp</td>

<td width="350"><input name="No_telp" type="No_telp" id="No_telp" size="40" /></td>
</tr>

<tr>
<td width="120">Email</td>

<td width="350"><input name="Email" type="Email" id="Email" size="40" /></td>
</tr>


<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="tambahLogin" value="Tambah" /> <input type="reset" name="resetbtn" value="Reset" /></td>
</tr>
<tr>
         
          <td colspan='2'>
            <div id="form1_errorloc" style="color:red">
            </div>
          </td>
        </tr>
</table>
</td>
</form>
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

