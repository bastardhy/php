<?php 
session_start();
try{
$connect = new PDO ("mysql:host=localhost;dbname=myweb","root","4r4d14nX");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST["send"])){
	if(empty($_POST["email"])){
		$message = '<label style="color:red">Email are required</label>';
	}else{
		$statement = $connect->prepare("SELECT pass FROM users WHERE (email = :email)");
		$statement->execute();
		$count = $statement->rowCount();
	if($count == 1){
		$_SESSION["name"] = $_POST["name"];
		header("location:../signin");
	}else{
		$message = '<strong>Invalid Email</strong>';
	}	}	}	}
catch(PDOException $error){
		$message = $error->getMessage();
		}
?>

<html>
<head>
	<title>Reset</title>
	<link href="../css/intro.css" rel="stylesheet" type="text/css" >
	<link href='../images/house.png' rel='icon' type='png'>
</head>
<body>
		<div id="header">
		<img src="../images/weblogo.png" alt="logo">
		</div>
		<div class="wrapper">
			<?php
			if(isset($message)){
			echo '<strong style="color:red">'.$message.'</strong>';
			}
			?>
			<h1>Reset Password</h1>
			<form method="post">
			<input type="text" name="email" placeholder="email address" required>
			<input type="submit" name="send" id="reset-button" value="SEND">
			</form>
		</div>
		<div class="footer">Copyleft <span class="copy-left">&copy;</span> 2017 Credit by Ardhy Aradian</div>
</body>
</html>