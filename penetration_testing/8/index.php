<html>
<head>
	<title>Modul 8</title>
</head>
<body>

<?php

if (isset($_POST['go']))
{
	$lines = file('mem.dat');
	
	$logged = false;
	
	foreach ($lines as $line)
	{
		$data = explode('|', $line);
	
		if ($_POST['user'] == $data[0] && $_POST['pass'] == $data[1])
		{
			echo 'User '.$data[0].' logged in <br />';
			
			if ($data[3] == 'normal')
			{
				echo 'Regular user';
			}
			else if ($data[3] == 'admin')
			{
				echo 'Administrator';
			}
			
			$logged = true;
		}
	}
	
	if (!$logged)
	{
		echo 'Bad user/pass data';
	}
}
else
{
?>
	<form method="post">
		<input type="text" name="user" /> Login <br />
		<input type="password" name="pass" /> Password <br />
		<input type="submit" name="go" value="Login" />
	</form>
	Belum punya akun? <a href="register.php">Daftar</a>
<?php
}
?>

</body>
</html>