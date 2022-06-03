<?php
	session_start();
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%" height="30" bgcolor="#AEFFAE">LOGO</td>
    <td width="75%" height="30" align="right" bgcolor="#AEFFAE">Selamat Datang, <b><?php echo "$_SESSION[nama]"; ?></b> | <a href="home.php">Home</a> | <a href="<?php echo "account.php?username=$_SESSION[nama]";?>">Akun Anda</a> | <a href="logout.php">Logout</a></td>
  </tr>
</table>

