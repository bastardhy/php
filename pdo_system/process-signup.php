<?php
try{
$con = new PDO ("mysql:host=localhost;dbname=mujahid","root","4r4d14nX");
if(isset($_POST['signup'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$date = $_POST['date'];
$month = $_POST['month'];
$year = $_POST['year'];

$insert = $con->prepare("INSERT INTO users (name,email,pass,date,month,year)
values (:name,:email,:pass,:date,:month,:year) ");
$insert->bindParam(":name",$name);
$insert->bindParam(":email",$email);
$insert->bindParam(":pass",$pass);
$insert->bindParam(":date",$date);
$insert->bindParam(":month",$month);
$insert->bindParam(":year",$year);

$insert->execute();
header("Location: signup.php");
}
}
catch(PDOException $e)
{
echo "error".$e->getMessage();
}
?>