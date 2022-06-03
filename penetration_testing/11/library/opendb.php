<?php
// This is an example opendb.php
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db($dbname) or die( 'Error'. mysql_error() );
?>