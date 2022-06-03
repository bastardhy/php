<?php
	session_start();
	include "koneksi.php";
	$sqluserdari = mysql_query("select * from user where iduser='$_GET[iduserdari]'");
	$ruserdari = mysql_fetch_array($sqluserdari);
	
	$sqlpesan = mysql_query("select * from pesan where idpesan='$_GET[idpesan]'");
	$rpesan = mysql_fetch_array($sqlpesan);
		
	mysql_query("update pesan set sudahdibaca='S' where idpesan='$_GET[idpesan]'");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include "menu.php";?></td>
  </tr>
  <tr>
    <td><table width="60%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="25">Lihat Pesan</td>
        <td height="25">&nbsp;</td>
      </tr>
      <tr>
        <td height="25">Dari</td>
        <td height="25"><?php echo "$ruserdari[namalengkap]";?></td>
      </tr>
      <tr>
        <td height="25">Pesan</td>
        <td height="25"><?php echo "$rpesan[pesan]";?></td>
      </tr>
      <tr>
        <td height="25">Tanggal Kirim</td>
        <td height="25"><?php echo "$rpesan[tglkirimpesan]";?></td>
      </tr>
    </table></td>
  </tr>
</table>
