<?php
include('connect/connect.php');
if(isset($_POST['addfile'])) {

$target_dir = "files/";
    $target_file = $target_dir. basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $file = $target_file; //

    $addfile = $con->prepare("INSERT INTO file (file_name , file_type) VALUES (?,?)");

    $addfile->execute(array($file , $FileType));

    	echo "<script>alert('New File Uploaded'); window.location.href = 'index.php'; </script>";

}
?>