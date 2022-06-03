<?php
error_reporting(0);

$connect = mysqli_connect("localhost", "root","","dbphpgila");

require_once "PHPExcel/Classes/PHPExcel.php";
require_once "PHPExcel/Classes/PHPExcel/IOFactory.php";

$uploaddir = 'import/'; 
$file = $uploaddir .$_FILES['filename']['name']; 
$file_name = $_FILES['filename']['name'];

$import = move_uploaded_file($_FILES['filename']['tmp_name'], $file);

if ($import)
{ 
	$objPHPExcel = PHPExcel_IOFactory::load($file);
	
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle     = $worksheet->getTitle();
		$highestRow         = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
	    
	    $nrColumns = ord($highestColumn) - 64;
	    for ($row = 5; $row <= $highestRow; ++ $row) {
	    	$val = array();
	    	for ($col = 0; $col < $highestColumnIndex; ++ $col) {
	    		$cell = $worksheet->getCellByColumnAndRow($col, $row);
	    		$val[] = $cell->getValue();
			}
			
			$end = $val[1];
			$nama_lengkap = htmlspecialchars($val[2]);
			$alamat = htmlspecialchars($val[3]);
			$telepon = htmlspecialchars($val[4]);
			$jk = htmlspecialchars($val[5]);
			$biografi = htmlspecialchars($val[6]);
			
			if ($end == 'END'){
				break;
			}
			
			else{
				$sql = "INSERT INTO as_members (	nama_lengkap,
													alamat,
													telepon,
													jk,
													biografi)
											VALUES(	'$nama_lengkap',
													'$alamat',
													'$telepon',
													'$jk',
													'$biografi')";
				mysqli_query($connect, $sql);
			}
	    }
	}

	echo "FILE BERHASIL DIIMPORT";
}
?>