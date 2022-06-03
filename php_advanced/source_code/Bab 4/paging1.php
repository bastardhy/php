<h4>DATA STAFF DAN PENULIS CV. ASFA SOLUTION</h4>

<table border="1">
	<tr>
		<th>No</th>
		<th>Nama Staff</th>
		<th>Alamat</th>
	</tr>
<?php
$connect = mysqli_connect("localhost","root","","dbphpgila");

//Langkah 1: Tentukan batas,cek halaman & posisi data
$limit = 4;
$page = $_GET['page'];
if(empty($page)){
	$position = 0;
	$page = 1;
}
else{
	$position = ($page-1) * $limit;
}

//Langkah 2: Sesuaikan perintah SQL
$queryMember = "SELECT * FROM as_members LIMIT $position,$limit";
$sqlMember = mysqli_query($connect, $queryMember);

$no = 1 + $position; // Agar angka (penomoran) mengikuti paging
while ($dataMember = mysqli_fetch_array($sqlMember))
{
	echo "<tr>
			<td>$no</td>
			<td>$dataMember[nama_lengkap]</td>
			<td>$dataMember[alamat]</td>
		</tr>";
	$no++;
}
echo "</table>";

//Langkah 3: Hitung total data dan halaman serta link 1,2,3 ...
echo "<br>Halaman : ";

$queryCount = "SELECT * FROM as_members";
$sqlCount = mysqli_query($connect, $queryCount);
$totalData = mysqli_num_rows($sqlCount);
$totalPage = ceil($totalData/$limit);

for($i = 1; $i <= $totalPage; $i++)

if ($i != $page)
{
	echo " <a href='paging1.php?page=$i'>$i</a> | ";
}
else
{
	echo " <b>$i</b> | ";
}
echo "<p>Total staff : <b>$totalData</b> staff</p>";
?>
