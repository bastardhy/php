<?php

session_start();
require("../config.php");

if (isset($_SESSION['id']))
{
	$result = mysql_query('SELECT disabled FROM users WHERE id="'.$_SESSION['id'].'"');
	$row = mysql_fetch_assoc($result);
	
	if ($row['disabled'])
	{
		die('Account locked, contact with administrator!');
	}
}

if (isset($_GET['logout']))
{
	unset($_SESSION['id']);
}

?>
<html>
<head>
	<title>Modul 3</title>
</head>
<body>

<?php 
if (isset($_SESSION['id']) && $_SESSION['id'] > 0)
{
	?>
	User logged in, account active! <br />
	
	<a href="?logout">Logout</a>
	
	<?php
}
else
{
	if (isset($_POST['go']))
	{
		$sql = 'SELECT id, disabled, attempts, pass FROM users WHERE login="'.$_POST['login'].'"';
		$result = mysql_query($sql);
		
		if ($row = mysql_fetch_assoc($result))
		{
			if ($row['disabled'])
			{
				echo 'Account locked!';
			}
			else if ($row['pass'] == $_POST['pass'])
			{
				$_SESSION['id'] = $row['id'];
				
				echo 'Logged in <a href="?">Main page</a>';
			}
			else
			{
				echo 'Bad login/pass!';
				
				if ($row['attempts'] >= 2)
				{
					echo 'Account locked, contact with administrator!';
					
					mysql_query('UPDATE users SET disabled=1 WHERE id="'.$row['id'].'"');
				}
				else
				{
					mysql_query('UPDATE users SET attempts=attempts+1 WHERE id="'.$row['id'].'"');
				}
			}
		}
		else
		{
			echo 'Bad login/pass!';
		}
	}
	else
	{
		?>
	
		<form method="post">
			<input type="text" name="login" /> Login <br />
			<input type="password" name="pass" /> Password <br />
			<input type="submit" name="go" value="Send" />
		</form>
		
		<?php
	}
}
?>
</body>
</html>