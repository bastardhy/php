<?php

session_start();

include '../config.php';

?>

<html>
<head>
	<title>Comments page</title>
</head>
<body>

<?php

if (isset($_GET['logout']))
{
	unset($_SESSION['admin']);
}

if (isset($_POST['admin_go']))
{
	if ($_POST['user'] == 'admin' && $_POST['password'] == 'test')
	{
		$_SESSION['admin'] = 1;
	}
}

if (isset($_SESSION['admin']))
{
	echo 'Admin session! <br />';
}
else
{
	?>
		<form method="POST">
			<input type="text" name="user" /> <br />
			<input type="password" name="password" /> <br />
			<input type="submit" name="admin_go" value="Log in!" />
		</form>
	<?php
}

?>

<hr />

<form method="POST">
	<textarea name="comment" cols="30" rows="5"></textarea> <input type="submit" name="go" value="Leave comment!" />
</form>

<br />
<br />

<?php

if (isset($_POST['go']))
{
	mysql_query('INSERT INTO comments(text) VALUES("'.$_POST['comment'].'")');
}

?>

<br />
<br />

Comments:

<br />
<br />

<?php

$result = mysql_query('SELECT * FROM comments');
while ($row = mysql_fetch_assoc($result))
{
	echo $row['text'].'<br /><hr /><br />';
}

?>



</body>
</html>

