<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3"><?php include "menu.php"; ?></td>
  </tr>
  <tr>
    <td width="25%" align="center" valign="top"><br>
    <?php
    	include "koneksi.php";
		$sqluser = mysql_query("select * from user where username='$_SESSION[nama]'");
		$ruser = mysql_fetch_array($sqluser);
		if(empty($ruser['foto'])){
			echo "<img src='foto/no-thumbnail.jpg' height='200' border='1'>";
		}else{
			echo "<img src='foto/$ruser[foto]' height='200' border='1'>";
		}
		echo "<h3><a href='account.php?username=$_SESSION[nama]'>$ruser[namalengkap] ( $ruser[panggilan] )</a></h3>";
	?>
    </td>
    <td width="50%"><?php include "poststatus.php"; ?><?php include "status.php"; ?></td>
    <td width="25%" valign="top"><?php include "useronline.php"; ?></td>
  </tr>
</table>
