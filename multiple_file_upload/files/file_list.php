<?php include ("connect/connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Multiple File Upload with download</title>


	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="table">
<p>Records</p> 
	<table>
		<thead>
			<tr>
				<td>ID</td>
				<td>File Name</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
		<?php
		include ("connect/connect.php");
			$file_list = $con->prepare("SELECT * FROM file");
                $file_list->execute();
            $fetch = $file_list->fetchall();

             foreach ($fetch as $key => $row) {
             	?>
			<td><?php echo $row['file_id'] ?></td>
			<td><?php echo $row['file_name'] ?></td>
			<td><a href="delete_query.php?file_id=<?php echo$row['file_id']; ?>">Delete</a></td>
		</tbody>
		<?php } ?>
	</table>
</div>
</body>
</html>