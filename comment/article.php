<?php
/*
+----------------------------------------------------------------------------+
|     Copyright (c) 2008-2009 by al farisi
|     Website : www.alfarisi.web.id
|               www.indokreatif.net
|     E-mail  : el.numinous@gmail.com
+----------------------------------------------------------------------------+
*/

require_once 'function.php';

session_start();

$dbconn = sql_connect('localhost', 'root', 'password', 'test');
if(!$dbconn) {
    $exitmsg = "There seems to be a problem, sorry for the inconvenience. We should be back shortly.";
	exit($exitmsg);
}

if (isset($_GET['id'])) {
	$id = intval($_GET['id']);
} else {
	$id = 0;
}

$query = "SELECT * FROM article WHERE id={$id}";
$content = mysql_fetch_array(mysql_query($query));

echo "<div>{$content['title']}<br /><br />";
echo "{$content['body']}</div><br /><br />";
	
// komentar
$alert = "<div><span>Berikan Komentar</span>";

if(isset($_POST['kirim'])) {
	$error = false;
	$nama = trim($_POST['nama']);
	$email = check_email($_POST['email']);
	$pesan = trim($_POST['pesan']);
	$alert .= "<br><br><span style='color:#c00;'>";
	if (strlen($nama) < 2 || strlen($pesan) < 2) {
		$alert .= "Mohon tulis nama dan komentar dengan benar.<br>";
		$error = true;
	}
	if (!$email) {
		$alert .= "Alamat e-mail anda tidak valid.<br>";
		$error = true;
	}
	if (!verify_code($_POST['randomcode'], $_POST['code'])) {
		$alert .= "Kode salah.<br>";
		$error = true;
	}
	if (!$error) {
		$nama = strip_tags($nama);
		$pesan = strip_tags($pesan);
		mysql_query("INSERT INTO comment (article_id, name, email, comment, date) VALUES ({$id}, '{$nama}', '{$email}', '{$pesan}', NOW() )");
		
		unset($_POST['nama'],$_POST['email'],$_POST['pesan']);
			
		$alert .= "Terima kasih atas komentar anda..";
	}
}

$alert .= "</span></div><br>";

echo "<hr><a name='komentar'></a> Komentar<br><br>";

$query = mysql_query("SELECT * FROM comment WHERE article_id={$id} ORDER BY date");
while ($row = mysql_fetch_array($query)) {
	$nama = $row['name'];
	$komentar = $row['comment'];
	$datestamp = $row['date'];
	echo "<div style='border:1px solid;'>{$nama}<br />{$datestamp}<br />{$komentar}</div><br />";
}
	
$nama = isset($_POST['nama']) ? $_POST['nama'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$pesan = isset($_POST['pesan']) ? $_POST['pesan'] : "";

echo "<a name='postkomentar'></a> {$alert}";

$temp = create_code();
$code1 = $temp[0];
$code2 = $temp[1];

echo "<div>
<form method='POST' action='article.php?id={$id}#postkomentar'>
Nama:<br><input name='nama' size='30' type='text' value='{$nama}'><br><br>
E-mail:<br><input name='email' size='30' type='text' value='{$email}'><br><br>
Silahkan tulis komentar anda :<br><textarea cols='45' rows='5' name='pesan'>{$pesan}</textarea><br><br>
Masukkan kode berikut<br> {$code2} 
<input type='hidden' id='randomcode' name='randomcode' value='{$code1}' />
<input maxlength='6' size='6' type='text' name='code' />
<input value=' Kirim ' name='kirim' type='submit' />
</form>
</div>";


?>
<body>
<form action="kirim_buku-tamu.php" method="post" name="buku-tamu" class="style1" id="buku-tamu">
  <table width="433" border="0" align="center" cellpadding="4" cellspacing="2">
    <tr>
      <td width="118"><div align="right">Nama</div></td>
      <td width="293"><input name="nama" type="text" id="nama" size="40" /></td>
    </tr>
    <tr>
      <td><div align="right">Email</div></td>
      <td><input name="email" type="text" id="email" size="40" /></td>
    </tr>
    <tr>
      <td><div align="right">Jenis Kelamin</div></td>
      <td><select name="select">
        <option value="1" selected="selected">Laki-laki</option>
        <option value="2">Perempuan</option>
      </select></td>
    </tr>
    <tr>
      <td><div align="right">Komentar</div></td>
      <td><textarea name="komentar" cols="30" rows="5" id="komentar"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="kirim" type="submit" id="kirim" value="Kirim" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <br />
</form>
</body>



























