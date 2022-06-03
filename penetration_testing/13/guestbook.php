<?php
include '../config.php';
?>

<html>
<head>
	<title>Comments page</title>
</head>
<body>

<form method="POST">
	<textarea name="comment" cols="30" rows="5"></textarea> 
	<input type="submit" name="go" value="Leave comment!" />
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

