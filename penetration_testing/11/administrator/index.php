<?php
// Jangan lupa bikin session 
session_start();

$errorMessage = '';
if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) {
   include '../library/config.php';
   include '../library/opendb.php';

   $userId = $_POST['txtUserId'];
   $password = md5($_POST['txtPassword']);

   // jika kombinasi user & password cocok
   $sql = "SELECT user_id
           FROM table_user
           WHERE user_id = '$userId'
                 AND password_id = '$password'";

   $result = mysql_query($sql)
             or die('Mr.SQL Said : ' . mysql_error());

   if (mysql_num_rows($result) == 1) {
      // set session dengan nama xyb attacker
      $_SESSION['xyb_injection'] = true;

      // setelah login redirect ke halaman main.php
      header('Location: admin.php');
      exit;
   } else 
     //kl kombinasi user & passwordsalah kasih pesen  
   {
      $errorMessage = 'Sorry, User id / password Invalid';
   }

   include '../library/closedb.php';
}
?>

<html>
<head>
<title>Administrator Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
if ($errorMessage != '') {
?>
<p align="center"><strong><font color="#990000"><?php echo $errorMessage; ?></font></strong></p>
<?php
}
?>
<form method="post" name="frmLogin" id="frmLogin">
<table width="400" border="1" align="center" cellpadding="2" cellspacing="2">
<tr>
<td width="150">Administrator</td>
<td><input name="txtUserId" type="text" id="txtUserId"></td>
</tr>
<tr>
<td width="150">Password</td>
<td><input name="txtPassword" type="password" id="txtPassword"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="btnLogin" value="Login"> | 
<a href="../">Home</a>
</td>
</tr>
</table>
</form>
</body>
</html>