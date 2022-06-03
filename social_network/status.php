<?php
	session_start();
	include "koneksi.php";
	$sql = mysql_query("select * from user, status where status.iduser=user.iduser order by tglposting desc");
	while($r = mysql_fetch_array($sql)){
		echo "<table width='500' border='0' cellspacing='5' cellpadding='5'>
		  <tr>
			<td width='90' valign='top' align='right'>";
			if(empty($r['foto'])){
			   echo "<img src='foto/no-thumbnail.jpg' height='60' border='1'>";
			}else{
			   echo "<img src='foto/$r[foto]' height='60' border='1'>";
			}
			echo "</td>
			<td valign='top' bgcolor='#DFFFDF'><b><a href='profil.php?iduser=$r[iduser]'>$r[namalengkap]</a></b><br>$r[status]<br><i>pada $r[tglposting] WIB</i></td>
		  </tr>
		</table>";
		include "komentar.php";	
	}	
?>