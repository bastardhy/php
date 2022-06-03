<?php
	session_start();
	include "koneksi.php";
	$sqluserdari = mysql_query("select * from user where username='$_SESSION[nama]'");
	$ruserdari = mysql_fetch_array($sqluserdari);
	
	$sqluserke = mysql_query("select * from user where iduser='$_GET[iduser]'");
	$ruserke = mysql_fetch_array($sqluserke);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include "menu.php";?></td>
  </tr>
  <tr>
    <td>
    <form name="form1" method="post" action="pesanaksi.php">
      <table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="25">Kirim Pesan</td>
          <td height="25">&nbsp;</td>
        </tr>
        <tr>
          <td height="25">Ke</td>
          <td height="25">
            <input type="hidden" name="iduserdari" id="iduserdari" value="<?php echo "$ruserdari[iduser]";?>">
            <input type="hidden" name="iduserke" id="iduserke" value="<?php echo "$ruserke[iduser]";?>">
            <input type="text" name="ke" id="ke" value="<?php echo "$ruserke[namalengkap]";?>"></td>
        </tr>
        <tr>
          <td height="25">Pesan</td>
          <td height="25">
            <textarea name="pesan" id="pesan" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td height="25"><input type="submit" name="button" id="button" value="Kirim Pesan"></td>
          <td height="25">&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
