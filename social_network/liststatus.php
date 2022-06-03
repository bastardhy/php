<?php
	session_start();
	include "koneksi.php";
	$sqluser = mysql_query("select * from user where username='$_SESSION[nama]'");
	$ruser = mysql_fetch_array($sqluser);
	$sql = mysql_query("select * from status where iduser=$ruser[iduser] order by tglposting desc");
	while($r = mysql_fetch_array($sql)){
		echo "<table width='600' border='0' cellspacing='5' cellpadding='5'>
		  <tr>
			<td width='90' valign='top' align='right'>";
			if(empty($ruser['foto'])){
			   echo "<img src='foto/no-thumbnail.jpg' height='60' border='1'>";
			}else{
			   echo "<img src='foto/$ruser[foto]' height='60' border='1'>";
			}
			echo "</td>
			<td valign='top' bgcolor='#DFFFDF'><b><a href='profil.php?iduser=$ruser[iduser]'>$ruser[namalengkap]</a></b><br>$r[status]<br><i>pada $r[tglposting] WIB</i></td>
		  </tr>
		</table>";
		include "listkomentar.php";	
	}
	
?>