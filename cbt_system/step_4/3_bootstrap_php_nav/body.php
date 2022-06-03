<?php
	echo"<div class='container'>";
	if ($_GET["modul"]=="home"){
		echo"ini Halaman Beranda";
		}
	elseif ($_GET['modul']=='form'){
  	include "modul/form.php";
	}	
	elseif ($_GET['modul']=='icon'){
  	include "modul/icon.php";
	}	
	echo"</div>";
?>