<html>
<head>
	<title>Test page</title>
</head>
<body>
	
<?php

if (isset($_GET['site']))
	$site = $_GET['site'];
else
	$site = 'main.txt';

echo file_get_contents ($site);

?>

<br />
<a href="index.php?site=main.txt" />Main page</a> <br />
<a href="index.php?site=page2.txt" />Page 2</a> <br />

</body>
</html>