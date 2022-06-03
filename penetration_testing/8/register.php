<html>
<head>
	<title>Register user</title>
</head>
<body>

<?php

if (isset($_POST['go']))
{
	$file = fopen('mem.dat', 'a+');
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$mail = $_POST['mail'];
	
	fputs($file, "\n".$user.'|'.$pass.'|'.$mail.'|normal');
	fclose($file);
	
	echo 'User registered';
}
else
{
?>
	Register user: <br />
	<form method="post">
		<input type="text" name="user"> User <br />
		<input type="password" name="pass"> Password <br />
		<input type="text" name="mail"> E-mail <br />
		<input type="submit" name="go" value="Send" />
	</form>
<?php
}
?>
</body>
</html>