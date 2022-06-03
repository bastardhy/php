<?php
include('connect/connect.php');

$file_id = $_GET['file_id'];
	$delete = $con->prepare("DELETE FROM file WHERE file_id = :file_id");
	$delete->bindParam(':file_id', $file_id);
	$delete->execute();

		echo "<script>alert('File Deleted'); window.location.href = 'file_list.php'; </script>";
?>