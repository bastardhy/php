<?php
	session_start();
	include "koneksi.php";
	$sql = mysql_query("select * from user where online='Y' order by namalengkap asc");
	
	echo "<p>&nbsp;</p>
	<table border='0' cellpadding='1' cellspacing='1' width='90%' align='center'>";
	echo "<tr bgcolor='#AEFFAE'>
		<td colspan='2'><b>User Online</b></td>
		</tr>";
	while ($r = mysql_fetch_array($sql)){	
		echo "<tr bgcolor='#DFFFDF'>
			<td width='50'>";
			if(empty($r['foto'])){
				echo "<img src='foto/no-thumbnail.jpg' width='50' border='1'>";
			}else{
				echo "<img src='foto/$r[foto]' width='50' border='1'>";
			}
			echo "</td>
			<td><a href='profil.php?iduser=$r[iduser]'>$r[namalengkap]</a></td>
		</tr>";
	}
	echo "</table>";
?>