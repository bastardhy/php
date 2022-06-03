<h4>DATA STAFF DAN PENULIS CV. ASFA SOLUTION</h4>

<table border="1">
	<tr>
		<th>No</th>
		<th>Nama Staff</th>
		<th>Alamat</th>
	</tr>
<?php
$connect = mysqli_connect("localhost","root","","dbphpgila");
include "class_paging.php";

// panggil class paging google	
$p = new PagingGoogle;
// batasi tampilan 
$limit  = 4;
$position = $p->searchPosition($limit);
	
$queryMember = "SELECT * FROM as_members LIMIT $position,$limit";
$sqlMember = mysqli_query($connect, $queryMember);
$i = 1 + $position;
while ($dataMember = mysqli_fetch_array($sqlMember))
{
	echo "<tr>
		<td>$i</td>
		<td>$dataMember[nama_lengkap]</td>
		<td>$dataMember[alamat]</td>
	</tr>
	";
	$i++;
}
echo "</table><br>";
	
$queryJmlData = "SELECT * FROM as_members";
$sqlJmlData = mysqli_query($connect, $queryJmlData);
$numsJmlData = mysqli_num_rows($sqlJmlData);
	
$jmlhalaman = $p->totalPage($numsJmlData, $limit);
$pageLink = $p->navPage($_GET['page'], $jmlhalaman);
	
echo $pageLink;
?>