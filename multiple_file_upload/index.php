<?php include ("connect/connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Multiple File Upload with download</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="form">
	<form action="addfile_query.php" method="POST" enctype = "multipart/form-data">
	<label>Upload File</label>
	<input type= "file" name="file" id="file">
	<br>
	<button type="submit" name="addfile">Submit</button>

	<a href="file_list.php">View Records</a>
</form>
</div>
</body>
</html>