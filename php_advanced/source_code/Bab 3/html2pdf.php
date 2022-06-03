<?php
ob_start();
require ("html2pdf/html2pdf.class.php");

$filename="html2pdf.pdf";
$content = ob_get_clean();
//<span style='font-size: 10pt;'>Jl. Sukarjo Wiryopranoto No. 97B Maphar, Kec. Taman Sari - Jakarta Barat 11160, Telp. (021) 6390363</span>
$content = "<table style='padding-bottom: 10px; width: 240mm;'>
				<tr valign='top'>
					<td style='width: 170mm;' valign='middle'>
						<div style='font-weight: bold; padding-bottom: 5px; font-size: 12pt;'>
							AGUSSAPUTRA.COM
						</div>
					</td>
					<td style='width: 70mm;'></td>
				</tr>
				<tr valign='top'>
					<td><span style='font-size: 10pt;'>GTC Lt. 2 No. 7, Jl. Dr. Cipto Mangunkusumo No. 1 Cirebon</span>
					</td>
					<td>
						<span style='font-size: 11pt;'><b>DATA STAFF</b></span>
					</td>
				</tr>
			</table><br>
			<table cellpadding='0' cellspacing='0' style='width: 240mm;'>
				<tr>
					<th style='width: 10mm; padding: 5px 0px 5px 0px; font-size: 10pt; border-top: 1px solid #999999; border-bottom: 1px solid #999999;'>NO.</th>
					<th style='width: 100mm; padding: 5px 0px 5px 0px; font-size: 10pt; border-top: 1px solid #999999; border-bottom: 1px solid #999999;'>NAMA STAFF</th>
					<th style='width: 100mm; padding: 5px 0px 5px 0px; font-size: 10pt; border-top: 1px solid #999999; border-bottom: 1px solid #999999;'>JABATAN</th>
				</tr>";
				
				// showing the categories
				
				$content .= "
					<tr valign='top'>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>1</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Agus Saputra</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>CEO</td>
					</tr>
					<tr valign='top'>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>2</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Feni Agustin</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>COO</td>
					</tr>
					<tr valign='top'>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>3</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Hadi Setiawan</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Manager</td>
					</tr>
					<tr valign='top'>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>4</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Anthonius Suharta</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>QA Support</td>
					</tr>
					<tr valign='top'>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>5</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Yohana F</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Content Writer & Admin</td>
					</tr>
					<tr valign='top'>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>6</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Asep</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Gudang</td>
					</tr>
					<tr valign='top'>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>7</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Daniel Put Rahmanto</td>
						<td style='padding: 5px 0px 5px 0px; font-size: 10pt;'>Lead Designer</td>
					</tr>
			</table>
		
			";

ob_end_clean();
// conversion HTML => PDF
try
{
	$html2pdf = new HTML2PDF('P', array('241', '280'),'fr', false, 'ISO-8859-15',array(2, 2, 2, 2)); //setting ukuran kertas dan margin pada dokumen anda
	// $html2pdf->setModeDebug();
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
	$html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>