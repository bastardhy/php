<?php
session_start();
session_register('username');

//file konfigurasi
include ('inc/config.php');

$username = $_POST['username'];
$password = $_POST['password'];

$password = md5($password);

$sql= "select * from pengelola where username='$username'
  and password='$password' ";

$userquery = mysql_query($sql) or die(mysql_error());
// 	$valid=false;
if (mysql_num_rows($userquery) == 1) {

	header('location:index.php');
	$valid = true;
	$_SESSION['username'] = $username;
}

if ($valid == false) {
	header("Location:form_login.php?status=1");
}
?>

