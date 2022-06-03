<?php

$login = 'admin';
$password = 'r00t';

?>

<html>
<head>
	<title>PHP Form Auth</title>
</head>
<body>
	<?php
	
	if (isset($_POST['go_field']))
	{
		if ($_POST['login_field'] == $login && $_POST['password_field'] == $password)
		{
			echo 'Anda telah login';
		}
		else
		{
			echo 'Error';
		}
	}
	else
	{
	?>
		<form method="POST">
			<input type="text" name="login_field" /> Login <br />
			<input type="password" name="password_field" /> Password <br />
			<input type="submit" name="go_field" value="Login" />
		</form>
	<?php
	}
	?>
</body>
