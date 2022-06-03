<?php
	$sql="SELECT teks FROM articles WHERE id=".$_GET['id'];
	$hasil = mysql_query($sql);
	if (!$hasil){
		echo mysql_error();
	}
	else{
		while ($db=mysql_fetch_assoc($hasil)) {
			echo $db['teks'];
		}
	}
?>