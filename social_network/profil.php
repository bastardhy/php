<table width="101%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include "menu.php";?></td>
  </tr>
  <tr>
    <td>
    <?php
    include "koneksi.php";
	$sqluser = mysql_query("select * from user where iduser='$_GET[iduser]'");
	$ruser = mysql_fetch_array($sqluser);
	?>
    <br><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="25%" rowspan="7" align="center" bgcolor="#DFFFDF">
        <?php
        	if(empty($ruser['foto'])){
				echo "<img src='foto/no-thumbnail.jpg' width='200' border='1'>";
			}else{
				echo "<img src='foto/$ruser[foto]' width='200' border='1'>";
			}
		?>
        </td>
        <td height="25" colspan="2" bgcolor="#DFFFDF"><h1><?php echo "$ruser[namalengkap]"; ?> (  <?php echo "$ruser[panggilan]"; ?> )</h1></td>
        </tr>
      <tr>
        <td width="40%" height="25" bgcolor="#DFFFDF"><b><?php echo "$ruser[tmplahir]"; ?> / <?php echo "$ruser[tgllahir]"; ?></b></td>
        <td width="35%" height="25" bgcolor="#DFFFDF">No HP : <b><?php echo "$ruser[nohp]"; ?></b></td>
      </tr>
      <tr>
        <td width="40%" height="25" bgcolor="#DFFFDF"><b><?php echo "$ruser[jk]"; ?> ( <?php echo "$ruser[status]"; ?> )</b></td>
        <td width="35%" height="25" bgcolor="#DFFFDF">Email : <b><?php echo "$ruser[email]"; ?></b></td>
      </tr>
      <tr>
        <td width="40%" height="25" bgcolor="#DFFFDF">
		<?php echo "<a href='pesan.php?iduser=$ruser[iduser]'>Kirim pesan</a>"; ?></td>
        <td width="35%" height="25" bgcolor="#DFFFDF">Website : <b><?php echo "$ruser[website]"; ?></b></td>
      </tr>
      <tr>
        <td height="25" colspan="2" bgcolor="#DFFFDF">Alamat : <b><?php echo "$ruser[alamat]"; ?></b></td>
        </tr>
      <tr>
        <td height="25" colspan="2" bgcolor="#DFFFDF">Hobi : <b><?php echo "$ruser[hobi]"; ?></b></td>
      </tr>
      <tr>
        <td height="25" colspan="2" bgcolor="#DFFFDF">Tentang Saya : <b><?php echo "$ruser[aboutme]"; ?></b></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <?php
	$sql = mysql_query("select * from status where iduser='$ruser[iduser]' order by tglposting desc");
	while($r = mysql_fetch_array($sql)){
		echo "<table width='500' border='0' cellspacing='5' cellpadding='5'>
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
		$sqlkom = mysql_query("select * from komentar where idstatus='$r[idstatus]' order by tglkomentar asc");
while ($rkom = mysql_fetch_array($sqlkom)){
	$sqlus = mysql_query("select * from user where iduser='$rkom[iduser]'");
	$rus = mysql_fetch_array($sqlus);
	echo "<table width='500' border='0' cellspacing='5' cellpadding='5'>
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
	
	}	
?>
    </td>
  </tr>
</table>
