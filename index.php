<?php
	session_start();
	if(isset($_SESSION["name"])){
	header ("location:../home");
	}else{
	echo "<script>alert('Welcome, Please register or signin to view content'); window.location.href = '../signin'; </script>";
	}
?>