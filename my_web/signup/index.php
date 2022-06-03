<?php
try{
	$connect = new PDO ("mysql:host=localhost;dbname=myweb","root","4r4d14nX");
	if(isset($_POST['signup'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = md5($_POST['pass']."ALS52KAO09");
		$pass2 = md5($_POST['pass2']."ALS52KAO09");
	
	if(strstr($email,"@")){
	if($pass==$pass2){
		$insert = $connect->prepare("INSERT INTO users (name,email,pass,pass2)	VALUES (:name,:email,:pass,:pass2)");
		$insert->bindParam(":name",$name);
		$insert->bindParam(":email",$email);
		$insert->bindParam(":pass",$pass);
		$insert->bindParam(":pass2",$pass2);
		$insert->execute();
		$count = $insert->rowCount();
	if($count > 0){
		echo '<center><label style="color:goldenrod">Registration Succes ! Please <a href="../signin">signin</a></label></center>';
	}else {
		$message = '<strong>Account Already Exist</strong>';
			}
	}else{
		$message = '<strong>Password Do Not Match</strong>';
			}
	}else{
		$message = '<strong>Invalid Email</strong>';
	}	}	}
catch(PDOException $error){
		$message = $error->getMessage();
		}
?>

<html>
<head>
	<title>Signup</title>
	<link href="../css/intro.css" rel="stylesheet" type="text/css">
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
			<h1>Sign Up</h1>
			<form method="post">
			<input type="text" name="name" placeholder="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,20}$" required>
			<input type="text" name="email" placeholder="email address" required>
			<input type="password" name="pass" placeholder="password" pattern="(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$" required>
			<input type="password" name="pass2" placeholder="confirm password" pattern="(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{6,15})$" required>
			<input type="submit" name="signup" id="signup-button" value="SIGN UP">
			</form>
		</div>
		<div class="footer">Copyleft <span class="copy-left">&copy;</span> 2017 Credit by Ardhy Aradian</div>
</body>
</html>

