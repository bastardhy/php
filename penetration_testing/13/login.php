<?php
session_start();
include '../config.php';
?>

<html>
<head>
	<title>Comments page</title>
</head>
<body>

<form method="POST">
	<input type="text" name="login">
	<input type="password" name="pass">
	<input type="submit" name="go" value="Send!" />
</form>

<br />
<br />

<?php

if (isset($_POST['go']))
{
	$result = mysql_query('SELECT id FROM users WHERE login="'.$_POST['login'].'" AND pass="'.$_POST['pass'].'"');
	
	if (mysql_fetch_assoc($result))
	{
		echo 'Login OK <br />';
		
		$_SESSION['admin'] = 1;
	}
	else
		echo 'Login FAILED';
}

?>


</body>
</html>