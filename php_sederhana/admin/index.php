<?php include('akses.php'); ?>
<html>
<head>
	<title>Admin Area | tutorialweb.net</title>
</head>
<body>
 
	<div style="text-align:center">
		<h2>Admin Area</h2>
		<p><a href="index.php">Home</a> / <a href="../logout.php">Logout</a></p>
 
		<p>Selamat datang di Admin Area, Anda Login dengan username <?php echo $_SESSION['admin']; ?></p>
	</div>
 
</body>
</html>