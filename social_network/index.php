<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%"><form name="form1" method="post" action="registeraksi.php">
      <table width="90%" border="0" align="center" cellpadding="2" cellspacing="1">
        <tr>
          <td height="30" colspan="2" align="center" bgcolor="#AEFFAE"><strong>FORM REGISTRASI</strong></td>
          </tr>
        <tr>
          <td height="30" align="right" bgcolor="#DDFFDD">Username : </td>
          <td height="30" bgcolor="#DDFFDD"><label for="username"></label>
            <input type="text" name="username" id="username"></td>
        </tr>
        <tr>
          <td height="30" align="right" bgcolor="#DDFFDD">Password : </td>
          <td height="30" bgcolor="#DDFFDD"><label for="password"></label>
            <input type="password" name="password" id="password"></td>
        </tr>
        <tr>
          <td height="30" align="right" bgcolor="#DDFFDD">Email : </td>
          <td height="30" bgcolor="#DDFFDD"><label for="email"></label>
            <input type="text" name="email" id="email"></td>
        </tr>
        <tr>
          <td height="30" align="right" bgcolor="#DDFFDD">Tanggal Lahir : </td>
          <td height="30" bgcolor="#DDFFDD"><label for="tgl"></label>
            <select name="tgl" id="tgl">
			<?php
				for($i=1; $i<=31; $i++){
					echo "<option value='$i'>$i</option>";
				}
			?>
            </select>
            <label for="bln"></label>
            <select name="bln" id="bln">
			<?php
				for($j=1; $j<=12; $j++){
					if($j==1) { $bulan="Januari"; }
					else if($j==2) { $bulan="Februari"; }
					else if($j==3) { $bulan="Maret"; }
					else if($j==4) { $bulan="April"; }
					else if($j==5) { $bulan="Mei"; }
					else if($j==6) { $bulan="Juni"; }
					else if($j==7) { $bulan="Juli"; }
					else if($j==8) { $bulan="Agustus"; }
					else if($j==9) { $bulan="September"; }
					else if($j==10) { $bulan="Oktober"; }
					else if($j==11) { $bulan="November"; }
					else { $bulan="Desember"; }
					echo "<option value='$j'>$bulan</option>";
				}
			?>
            </select>
            <label for="thn"></label>
            <select name="thn" id="thn">
			<?php
				$t = date("Y");
				for($k=1945; $k<=($t-13); $k++){
					echo "<option value='$k'>$k</option>";
				}
			?>
            </select></td>
        </tr>
        <tr>
          <td height="30" align="right" bgcolor="#DDFFDD">Jenis Kelamin : </td>
          <td height="30" bgcolor="#DDFFDD"><input type="radio" name="jk" id="radio" value="L">
            <label for="jk">Laki-Laki
              <input type="radio" name="jk" id="radio2" value="P">
            Perempuan</label></td>
        </tr>
        <tr>
          <td height="30" bgcolor="#DDFFDD">&nbsp;</td>
          <td height="30" bgcolor="#DDFFDD"><input type="submit" name="button" id="button" value="Register" /></td>
        </tr>
      </table>
    </form></td>
    <td valign="top"><form id="form2" name="form2" method="post" action="loginaksi.php">
      <table width="90%" border="0" align="center" cellpadding="2" cellspacing="1">
        <tr>
          <td height="30" colspan="2" align="center" bgcolor="#AEFFAE"><strong>FORM LOGIN</strong></td>
          </tr>
        <tr>
          <td height="30" align="right" bgcolor="#DDFFDD">Username : </td>
          <td height="30" bgcolor="#DDFFDD"><label for="username3"></label>
            <input type="text" name="username" id="username3" /></td>
        </tr>
        <tr>
          <td height="30" align="right" bgcolor="#DDFFDD">Password : </td>
          <td height="30" bgcolor="#DDFFDD"><label for="password3"></label>
            <input type="password" name="password" id="password3" /></td>
        </tr>
        <tr>
          <td height="30" bgcolor="#DDFFDD">&nbsp;</td>
          <td height="30" bgcolor="#DDFFDD"><input type="submit" name="button2" id="button2" value="Login" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
