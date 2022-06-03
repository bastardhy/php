
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<head>
<title>Klikaja.com</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
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
			<li><a href="../home" class="current">Home</a></li>
			<li><a href="../category">Category</a></li> 
			<li><a href="../about">About</a></li>
			<li><a href="../contact">Contact</a></li>
			<li><a href="../signout">Signout</a></li>
			<form method="get" id="search-form">
			<input type="text" id="search-box" name="q" placeholder=" Search Product... ">
			<input type="submit" id="search-button" value=">>">
			</form>	
		</ul>
	</div>
	<div id="content">
		<div id="list1">
			<div id="box1"></div>
			<div id="box2"></div>
			<div id="box3"></div>
			<div id="box4"></div>
		</div>
		<div id="list2">
			<div id="box1"></div>
			<div id="box2"></div>
			<div id="box3"></div>
			<div id="box4"></div>
		</div>
		<div id="list3">
			<div id="box1"></div>
			<div id="box2"></div>
			<div id="box3"></div>
			<div id="box4"></div>
		</div>
	</div>
	<div id="nav">
		<ul>
			<li><a href="index.php" class="current">1</a></li>
			<li><a href="#">2</a></li> 
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">>></a></li>
		</ul>
	</div>
</div>
<div class="footer">Copyleft <span class="copy-left">&copy;</span> 2017 Credit by Ardhy Aradian</div>
</body>
</html>