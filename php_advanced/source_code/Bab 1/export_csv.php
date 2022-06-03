<?php
$connect = mysqli_connect("localhost","root","","dbphpgila");

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=member_csv.csv');
 
$output = fopen("php://output", "w");

fputcsv($output, array('ID MEMBER', 'NAMA LENGKAP', 'ALAMAT', 'TELEPON', 'JK', 'BIOGRAFI'));
$query = "SELECT * FROM as_members";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result))
{
	fputcsv($output, $row);
}
fclose($output);
?>