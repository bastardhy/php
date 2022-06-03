<?php 
session_start();
try{
$connect = new PDO ("mysql:host=localhost;dbname=myweb","root","4r4d14nX");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(isset($_POST["signin"])){
	if(empty($_POST["name"]) || empty($_POST["pass"])){
		$message = '<label style="color:red">Please Fill All Field</label>';
	}else{
		$statement = $connect->prepare("SELECT * FROM users WHERE (name = :name AND pass = :pass)");
		$statement->execute(array(
						'name' => $_POST["name"],
						'pass' => md5($_POST["pass"]."ALS52KAO09")));
		$count = $statement->rowCount();
	if($count > 0){
		$_SESSION["name"] = $_POST["name"];
		header("location:../home");
	}else{
		$message = '<strong>Invalid Account</strong>';
	}	}	}	}
catch(PDOException $error){
		$message = $error->getMessage();
		}
?>

<html>
<head>
	<title>Signin</title>
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
			<h1>Sign In</h1>
			<form method="post">
			<input type="text" name="name" placeholder="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,20}$" required>
			<input type="password" name="pass" placeholder="password" pattern="(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$" required>
			<input type="submit" name="signin" id="signin-button" value="SIGN IN">
			<li><a href="../signup">Register</a></li>
			<li><a href="../reset">Forgot Password?</a></li>
			</form>
		</div>
		<div class="footer">Copyleft <span class="copy-left">&copy;</span> 2017 Credit by Ardhy Aradian</div>
</body>
</html>