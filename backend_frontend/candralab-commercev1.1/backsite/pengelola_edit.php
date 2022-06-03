<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['submitUser'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$password = md5($password);
	$sql = " update pengelola set password='$password' where username='$username'";
	//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());

	//check if query successful
	if ($result) {
		header('location:index.php?page=pengelola_view&status=0');
	} else {
		header('location:index.php?page=pengelola_view&status=1');
	}
	mysql_close();
}
?>