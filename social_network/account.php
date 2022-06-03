<?php
	session_start();
	include "koneksi.php";
	$query = mysql_query("select * from user where username='$_SESSION[nama]'");
	$r = mysql_fetch_array($query);
	
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><?php include "menu.php"; ?></td>
  </tr>
  <tr>
    <td width="35%" valign="top"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
      <tr>
        <td height="30" colspan="2" align="center" bgcolor="#DFFFDF"><?php
			if(empty($r['foto'])){
				echo "<img src='foto/no-thumbnail.jpg' width='200' border='1'>";
			}else{
				echo "<img src='foto/$r[foto]' width='200' border='1'>";
			}
		?></td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="center" bgcolor="#DFFFDF"><form action="gantifotoaksi.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <label for="fupload"></label>
          <input type="file" name="fupload" id="fupload" />
          <input type="hidden" name="iduser" id="iduser" value="<?php echo "$r[iduser]"; ?>" />
<input type="submit" name="button" id="button" value="Ganti" />
        </form></td>
        </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Biodata</td>
        <td width="65%" height="30" align="right" bgcolor="#DFFFDF">| <a href="<?php echo "editaccount.php?iduser=$r[iduser]";?>">Edit Biodata</a> |</td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Nama Lengkap</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[namalengkap]"; ?></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Nama Panggilan</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[panggilan]"; ?></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Tempat / Tgl Lahir</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[tmplahir]"; ?> / <?php echo "$r[tgllahir]"; ?></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Jenis Kelamin</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[jk]"; ?></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Alamat</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[alamat]"; ?></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">No HP</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[nohp]"; ?></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Email</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><a href="<?php echo "mailto:$r[email]"; ?> "><?php echo "$r[email]"; ?></a></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Website</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><a href="<?php echo "http://$r[website]"; ?>" target="_blank"><?php echo "$r[website]"; ?></a></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Status</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[status]"; ?></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Hobi</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[hobi]"; ?></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Tentang saya</td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[aboutme]"; ?></td>
      </tr>
      <tr>
        <td width="35%" height="30" bgcolor="#DFFFDF">Terdaftar sejak </td>
        <td width="65%" height="30" bgcolor="#DFFFDF"><?php echo "$r[tgldaftar]"; ?></td>
      </tr>
    </table></td>
    <td width="65%" valign="top"><table width="95%" border="0" align="center" cellpadding="5" cellspacing="5">
      <tr>
    <td>
    <?php
    	$sqlpesan = mysql_query("select * from pesan where iduserke='$r[iduser]' and sudahdibaca='B' order by tglkirimpesan desc");
		$rowpesan = mysql_num_rows($sqlpesan);
		
		echo "Anda mempunyai <b>$rowpesan</b> pesan baru !!";
		
		while ($rpesan = mysql_fetch_array($sqlpesan)){
			$sqluserdari = mysql_query("select * from user where iduser='$rpesan[iduserdari]'");
			$ruserdari = mysql_fetch_array($sqluserdari);
			echo "<table width='600' border='0'>
				<tr><td>Dari <b>$ruserdari[namalengkap] </b> pada <i>$rpesan[tglkirimpesan]</i> | <a href='lihatpesan.php?idpesan=$rpesan[idpesan]&iduserdari=$ruserdari[iduser]'>Lihat pesan</a> |</td></tr>
				</table>";
		}
	?>
    </td>
  </tr>
  <tr>
    <td><?php include "updatestatus.php";?></td>
  </tr>
  <tr>
    <td><?php include "liststatus.php";?></td>
  </tr>
    </table></td>
  </tr>
</table>