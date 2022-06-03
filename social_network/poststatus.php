<?php
session_start();
include "koneksi.php";
$sql = mysql_query("select * from user where username='$_SESSION[nama]'");
$r = mysql_fetch_array($sql);
echo "<form name='form1' method='post' action='updatestatusaksi.php?mod=stat'>
  <table width='600' border='0' cellspacing='5' cellpadding='5'>
    <tr>
      <td width='90' align='right'>
	  <input type='hidden' name='iduser' value='$r[iduser]'>";
	if(empty($r['foto'])){
	   echo "<img src='foto/no-thumbnail.jpg' height='80' border='1'>";
	}else{
	   echo "<img src='foto/$r[foto]' height='80' border='1'>";
	}
	  echo "</td>
      <td bgcolor='#DFFFDF'><textarea name='status' id='status' cols='50' rows='3'></textarea></td>
    </tr>
    <tr>
      <td width='80'>&nbsp;</td>
      <td bgcolor='#DFFFDF'><input type='submit' name='button' id='button' value='Update Status'></td>
    </tr>
  </table>
</form>";
?>
