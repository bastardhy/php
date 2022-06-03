<?php
$sqlkom = mysql_query("select * from komentar where idstatus='$r[idstatus]' order by tglkomentar asc");
while ($rkom = mysql_fetch_array($sqlkom)){
	$sqlus = mysql_query("select * from user where iduser='$rkom[iduser]'");
	$rus = mysql_fetch_array($sqlus);
	echo "<table width='600' border='0' cellspacing='5' cellpadding='5'>
	<tr>
		<td width='80'>&nbsp;</td>
		<td width='60' align='right' valign='top'>";
	if(empty($rus['foto'])){
	   echo "<img src='foto/no-thumbnail.jpg' height='50' border='1'>";
	}else{
	   echo "<img src='foto/$rus[foto]' height='50' border='1'>";
	}
		echo "</td>
		<td valign='top' bgcolor='#F0FFF0'><b><a href='profil.php?iduser=$rus[iduser]'>$rus[namalengkap]</a></b><br>$rkom[komentar]<br><i>pada $rkom[tglkomentar] WIB</i></td>
	</tr>
	</table>";	
}
?>
<?php
echo "<form name='form1' method='post' action='kirimkomentar.php'>
	  <table width='600' border='0' cellspacing='5' cellpadding='5'>
		<tr>
		  <td width='80'>
		  <input type='hidden' name='iduser' id='iduser' value='$ruser[iduser]'>
		  <input type='hidden' name='idstatus' id='idstatus' value='$r[idstatus]'>
		  </td>
		  <td width='60' align='right'>";
	if(empty($ruser['foto'])){
	   echo "<img src='foto/no-thumbnail.jpg' height='50' border='1'>";
	}else{
	   echo "<img src='foto/$ruser[foto]' height='50' border='1'>";
	}
		  echo "</td>
		  <td bgcolor='#F0FFF0'>
		  <textarea name='komentar' id='komentar' cols='30' rows='2'></textarea></td>
		</tr>
		<tr>
		  <td width='80'>&nbsp;</td>
		  <td width='60'>&nbsp;</td>
		  <td bgcolor='#F0FFF0'><input type='submit' name='button' id='button' value='Kirim Komentar'></td>
		</tr>
	  </table>
	</form>";
?>