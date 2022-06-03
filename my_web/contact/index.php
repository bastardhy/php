
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<head>
<title>Klikaja.com</title>
<link href="../css/contact.css" rel="stylesheet" type="text/css" />
<link href="../images/shopping-bags-icon.png" rel="icon" type="png">
</head>
<body>
<div id="container">
	<div id="header">
		<img src="../images/weblogo.png" alt="logo">
		<label id="user">
		<?php
		session_start();
		if(isset($_SESSION["name"])){
		echo '<label style="color:white">welcome '.$_SESSION["name"].'</label>';
		}else{
		header("location:../signin");
		}
		?>
		</label>
	</div>
	<div id="menu">
    	<ul>
			<li><a href="../home">Home</a></li>
			<li><a href="../category">Category</a></li> 
			<li><a href="../about">About</a></li>
			<li><a href="../contact" class="current">Contact</a></li>
			<li><a href="../signout">Signout</a></li>
			<form method="POST" id="search-form">
			<input type="text" id="search-box" name="q" placeholder=" Search Product... ">
			<input type="submit" id="search-button" value=">>">
			</form>	
		</ul>
	</div>
	<div id="content">
		<div id="contact">
			<ul>
				<li><img src="../images/facebook.png" alt="facebook"><a href="https://www.facebook.com/bastardhy"> Facebook</a></li><br>
				<li><img src="../images/twitter.png" alt="facebook"><a href="https://twitter.com/bastardhy"> Twitter</a></li><br>
				<li><img src="../images/gplus.png" alt="facebook"><a href="https://www.googleplus.com/bastardhy"> Google+</a></li><br>
				<li><img src="../images/email.png" alt="facebook"><a href="https://www.gmail.com/bastardhy"> bastardhy@gmail.com</a></li><br>
			</ul>
		</div>
	</div>
</div>
<div class="footer">Copyleft <span class="copy-left">&copy;</span> 2017 Credit by Ardhy Aradian</div>
</body>
</html>