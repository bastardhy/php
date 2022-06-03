<?php
	session_start();
	include "menu.php";
	include "koneksi.php";
	$sql = mysql_query("select * from user where iduser='$_GET[iduser]'");
	$r = mysql_fetch_array($sql);
?>
<p>
<form name="form1" method="post" action="editaccountaksi.php" enctype="multipart/form-data">
  <table width="60%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
      <td width="30%" height="30" bgcolor="#9BFF9B"><strong>Update Biodata Anda
        <input type="hidden" name="iduser" id="iduser" value="<?php echo "$r[iduser]"; ?>" />
      </strong></td>
      <td width="70%" height="30" align="right" bgcolor="#9BFF9B">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">Nama Lengkap</td>
      <td height="30" bgcolor="#C6FFC6"><label for="namalengkap"></label>
      <input name="namalengkap" type="text" id="namalengkap" value="<?php echo "$r[namalengkap]";?>" size="50"></td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">Nama Panggilan</td>
      <td height="30" bgcolor="#C6FFC6"><label for="panggilan"></label>
      <input type="text" name="panggilan" id="panggilan" value="<?php echo "$r[panggilan]";?>"></td>
    </tr>
    <tr>
      <td width="30%" height="30" bgcolor="#C6FFC6">Tempat / Tgl Lahir</td>
      <td width="70%" height="30" bgcolor="#C6FFC6"><label for="tmplahir"></label>
        <input type="text" name="tmplahir" id="tmplahir" value="<?php echo "$r[tmplahir]";?>"> 
      / 
      <select name="tgl" id="tgl">
        <?php
			$d = substr($r['tgllahir'], 8, 2);
			  for($i=1; $i<=31; $i++){
				  if($d == $i){
             		echo "<option value='$i' selected>$i</option>";
				  }else{
             		echo "<option value='$i'>$i</option>";
				  }
			  }
              ?>
      </select>
      <label for="bln"></label>
      <select name="bln" id="bln">
        <?php
			$m = substr($r['tgllahir'], 5, 2);
			  for($j=1; $j<=12; $j++){
				if($j==1){ $bulan="Januari";}
				else if($j==2){ $bulan="Februari";}
				else if($j==3){ $bulan="Maret";}
				else if($j==4){ $bulan="April";}
				else if($j==5){ $bulan="Mei";}
				else if($j==6){ $bulan="Juni";}
				else if($j==7){ $bulan="Juli";}
				else if($j==8){ $bulan="Agustus";}
				else if($j==9){ $bulan="September";}
				else if($j==10){ $bulan="Oktober";}
				else if($j==11){ $bulan="November";}
				else{ $bulan="Desember";}
				if($m == $j){
 	               echo "<option value='$j' selected>$bulan</option>";
				}else{
 	               echo "<option value='$j'>$bulan</option>";
				}
			  }
              ?>
      </select>
      <label for="thn"></label>
      <select name="thn" id="thn">
        <?php
			$t = date("Y");
			$y = substr($r['tgllahir'], 0, 4);
			  for($k=1945; $k<=($t-15); $k++){
				  if($y == $k){
             		echo "<option value='$k' selected>$k</option>";
				  }else{
             		echo "<option value='$k'>$k</option>";
				  }
			  }
              ?>
      </select></td>
    </tr>
    <tr>
      <td width="30%" height="30" bgcolor="#C6FFC6">Jenis Kelamin</td>
      <td width="70%" height="30" bgcolor="#C6FFC6">
      <?php
	  if($r['jk'] == 'L'){
		  $l = "checked"; 	$p = "";
	  }else if($r['jk'] == 'P'){
		  $l = ""; 			$p = "checked";
	  }else{
		  $l = ""; 			$p = "";
	  }
      echo "<input type='radio' name='jk' value='L' $l>Laki-Laki";
      echo "<input type='radio' name='jk' value='P' $p>Perempuan";
	  ?>
      </td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">Alamat</td>
      <td height="30" bgcolor="#C6FFC6"><label for="alamat"></label>
      <textarea name="alamat" id="alamat" cols="45" rows="5"><?php echo "$r[alamat]";?></textarea></td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">No HP</td>
      <td height="30" bgcolor="#C6FFC6"><label for="nohp"></label>
      <input type="text" name="nohp" id="nohp" value="<?php echo "$r[nohp]";?>"></td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">Email</td>
      <td height="30" bgcolor="#C6FFC6"><label for="email"></label>
      <input name="email" type="text" id="email" value="<?php echo "$r[email]";?>"></td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">Website</td>
      <td height="30" bgcolor="#C6FFC6"><label for="website"></label>
      <input type="text" name="website" id="website" value="<?php echo "$r[website]";?>"></td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">Status</td>
      <td height="30" bgcolor="#C6FFC6"><label for="status"></label>
       <?php 
        echo "<select name='status' id='status'>";
		for($a=0; $a<=2; $a++){
			if($a==1){ $s = "Belum Menikah"; }
			else if($a==2){ $s = "Menikah"; }
			
			if($r['status'] == $s){
				$sel = "selected";	
			}else{
				$sel = "";
			}	
			echo "<option value='$s' $sel>$s</option>";
		}
      	echo "</select>";
      ?>
      </td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">Hobi</td>
      <td height="30" bgcolor="#C6FFC6"><label for="hobi"></label>
      <textarea name="hobi" id="hobi" cols="45" rows="5"><?php echo "$r[hobi]";?></textarea></td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">Tentang saya</td>
      <td height="30" bgcolor="#C6FFC6"><label for="aboutme"></label>
      <textarea name="aboutme" id="aboutme" cols="45" rows="5"><?php echo "$r[aboutme]";?></textarea></td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6">Terdaftar sejak </td>
      <td height="30" bgcolor="#C6FFC6"><?php echo "$r[tgldaftar]";?></td>
    </tr>
    <tr>
      <td height="30" bgcolor="#C6FFC6"><input type="submit" name="button" id="button" value="Update Biodata" /></td>
      <td height="30" bgcolor="#C6FFC6">&nbsp;</td>
    </tr>
  </table>
</form>
