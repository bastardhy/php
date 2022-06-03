<?php
/* Error reporting */
error_reporting(E_ALL);
session_start();
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

$connect = mysqli_connect("localhost","root","","dbphpgila");

date_default_timezone_set('ASIA/JAKARTA');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->getActiveSheet()->setCellValue('B4', 'NO');
$objPHPExcel->getActiveSheet()->setCellValue('C4', 'NAMA LENGKAP');
$objPHPExcel->getActiveSheet()->setCellValue('D4', 'ALAMAT');
$objPHPExcel->getActiveSheet()->setCellValue('E4', 'TELEPON');
$objPHPExcel->getActiveSheet()->setCellValue('F4', 'JK');
$objPHPExcel->getActiveSheet()->setCellValue('G4', 'BIOGRAFI');

$queryMember = "SELECT * FROM as_members ORDER BY id_member ASC";
$sqlMember = mysqli_query($connect, $queryMember);
$numsMember = mysqli_num_rows($sqlMember);
$i = 5;
while ($dtMember = mysqli_fetch_array($sqlMember)){
	$j = $i - 4;
	
	$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $j);
	$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $dtMember['nama_lengkap'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $dtMember['alamat'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $dtMember['telepon'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $dtMember['jk'], PHPExcel_Cell_DataType::TYPE_STRING);
	$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $dtMember['biografi'], PHPExcel_Cell_DataType::TYPE_STRING);
	
	$i++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment;filename=member.xlsx");
header('Cache-Control: max-age=0');

// Export to Excel2007 (.xlsx)
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>