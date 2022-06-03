<?php

session_start();

include '../config.php';

if (isset($_SESSION['admin']))
{
	if ($_GET['action'] == 'add_user')
	{
		mysql_query('INSERT INTO users(login, pass, disabled, attempts) VALUES("'.$_GET['user'].'", "'.$_GET['pass'].'", 0, 0)');
		
		echo 'Account created';
	}
}
else
{
	echo 'Anda harus Login!';
}

?>

