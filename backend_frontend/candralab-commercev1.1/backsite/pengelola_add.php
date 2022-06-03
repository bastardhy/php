<?php
include ('inc/config.php');
//data dari user
if (isset($_POST['tambahPengelola'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$password = md5($password);
	$sql = "INSERT INTO pengelola(username,password)
		VALUES('$username', '$password')";
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
