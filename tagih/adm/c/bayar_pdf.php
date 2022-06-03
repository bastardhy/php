<?php
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
/////// SISFO-PENAGIHAN v1.0                                    ///////
/////// Sistem Informasi Penagihan Client atas Produk Bulanan   ///////
///////////////////////////////////////////////////////////////////////
/////// Dibuat oleh :                                           ///////
/////// Agus Muhajir, S.Kom                                     ///////
/////// URL 	:                                               ///////
///////     * http://github.com/hajirodeon                      ///////
///////     * http://gitlab.com/hajirodeon                      ///////
/////// E-Mail	:                                               ///////
///////     * hajirodeon@yahoo.com                              ///////
///////     * hajirodeon@gmail.com                              ///////
/////// HP/SMS/WA : 081-829-88-54                               ///////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////


session_start();


//ambil nilai
require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");



//ambil nilai
$tkd = cegah($_REQUEST['tkd']);



//cek kalau ada
$qcc = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
									"WHERE kd = '$tkd' ".
									"LIMIT 0,1");
$rcc = mysqli_fetch_assoc($qcc);
$tcc = mysqli_num_rows($qcc);
$cc_p_bln = balikin($rcc['periode_bln']);
$cc_p_thn = balikin($rcc['periode_thn']);
$cc_user_kd = balikin($rcc['user_kd']);
$cc_user_kode = balikin($rcc['user_kode']);
$cc_user_nama = balikin($rcc['user_nama']);
$cc_user_alamat = balikin($rcc['user_alamat']);
$cc_user_koordinat = balikin($rcc['user_koordinat']);
$cc_user_telp = balikin($rcc['user_telp']);
$cc_kode = balikin($rcc['kode']);
$cc_diskon = balikin($rcc['discount']);
$cc_ppn = balikin($rcc['ppn']);
$cc_pajak1 = balikin($rcc['pajak1']);
$cc_pajak2 = balikin($rcc['pajak2']);
$cc_subtotal = balikin($rcc['subtotal']);
$cc_total = balikin($rcc['total']);

$cc_ttgl = balikin($rcc['tgl_tagihan']);
$cc_ttgl1 = substr($cc_ttgl,0,4);
$cc_ttgl2 = substr($cc_ttgl,5,2);
$cc_ttgl3 = substr($cc_ttgl,8,2);



$cc2_ttgl = balikin($rcc['tgl_expire']);
$cc2_ttgl1 = substr($cc2_ttgl,0,4);
$cc2_ttgl2 = substr($cc2_ttgl,5,2);
$cc2_ttgl3 = substr($cc2_ttgl,8,2);





$cc3_ttgl = balikin($rcc['tgl_bayar']);
$cc3_ttgl1 = substr($cc3_ttgl,0,4);
$cc3_ttgl2 = substr($cc3_ttgl,5,2);
$cc3_ttgl3 = substr($cc3_ttgl,8,2);





//bikin pdf
require_once("../../inc/class/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();


?>


<style>
div.page_break + div.page_break{
    page-break-before: always;
}



</style>





<?php

//isi *START
ob_start();




echo '<table width="530" cellpadding="1" cellspacing="1" border="0">
<tr valign="top">
<td align="left" width="300">
	<img src="../../img/logo_header.png" width="300">
</td>



<td align="right">

	<font size="6">
	<b>INVOICE</b>
	</font>
	<br>

	
		<table width="100%" cellpadding="1" cellspacing="1" border="0">
		<tr valign="top">
			<td align="right">
	
				<font size="2">
					No.Invoice :
				</font> 
			</td>
			
			<td>
			 INV-'.$cc_kode.'
			</td>
		
		</tr>
		
		<tr>
			<td align="right">
	
				<font size="2">
				ID Mitra :
				</font>
			</td>
			<td>
			 '.$cc_user_kode.'
			
			</td>
		</tr>

		<tr>		
			<td align="right">
	
				<font size="2">
				Tanggal :
				</font>
				
			</td>
			
			<td>
			'.$cc_ttgl3.' '.$arrbln1[$cc_ttgl2].' '.$cc_ttgl1.'
			
			</td>
		
		</tr>
		
		<tr>
			<td align="right">
			
				<font size="2">
					Jatuh Tempo :
				</font>
			
			</td>
			<td>
			'.$cc2_ttgl3.' '.$arrbln1[$cc2_ttgl2].' '.$cc2_ttgl1.'
			
			</td>
			
		</tr>
		
		</table>




</td>


</tr>
</table>

<hr>';


//profil
$qx = mysqli_query($koneksi, "SELECT * FROM m_profil");
$rowx = mysqli_fetch_assoc($qx);
$e_nama = balikin($rowx['nama']);
$e_alamat = balikin($rowx['alamat']);
$e_telp = balikin($rowx['telp']);
$e_email = balikin($rowx['email']);
$e_npwp = balikin($rowx['npwp']);
$e_norek = balikin($rowx['norek']);
$e_wa = balikin($rowx['wa']);




echo '<table width="100%" cellpadding="1" cellspacing="1" border="0">
<tr valign="top">
	<td align="left">

		<font size="2">
			<b>INFO PERUSAHAAN</b>
		</font>
		<hr>
		<b>'.$e_nama.'</b>
		<br>
		'.$e_alamat.'
		<br>
		Telp. : '.$e_telp.'
		<br>
		E-Mail : '.$e_email.'
		<br>
		NPWP : '.$e_npwp.'  
	</td>
	
	<td width="10">
	&nbsp;
	</td>

	<td align="left">

		<font size="2">
			<b>TAGIHAN UNTUK</b>
		</font>
		<hr>  
		<b>'.$cc_user_nama.'</b>
		<br>
		'.$cc_user_alamat.'
		<br>
		Koordinat : '.$cc_user_koordinat.'
		<br>
		Telp : '.$cc_user_telp.'
	</td>
	
</tr>

</table>';




echo '<div class="table-responsive">          
	<table class="table" width="100%" cellpadding="1" cellspacing="1" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="5"><strong><font color="'.$warnatext.'">NO</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">DESKRIPSI</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">PERIODE</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">QTY</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">HARGA</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">JUMLAH</font></strong></td>
	</tr>
	</thead>
	<tbody>';

	//list
	$qst = mysqli_query($koneksi, "SELECT * FROM user_tagihan_item ".
										"WHERE user_kd = '$cc_user_kd' ".
										"AND periode_bln = '$cc_p_bln' ".
										"AND periode_thn = '$cc_p_thn' ".
										"ORDER BY item_nama ASC");
	$rowst = mysqli_fetch_assoc($qst);
	$tst = mysqli_num_rows($qst);

	//jika ada
	if (!empty($tst))
		{
		do
			{
			$st_kd = nosql($rowst['kd']);
			$st_pbln = balikin($rowst['periode_bln']);
			$st_pthn = balikin($rowst['periode_thn']);
			$st_itemkd = balikin($rowst['item_kd']);
			$st_kode = balikin($rowst['item_kode']);
			$st_kode2 = cegah($rowst['item_kode']);
			$st_nama = balikin($rowst['item_nama']);
			$st_nama2 = cegah($rowst['item_nama']);
			$st_harga = balikin($rowst['item_harga']);
			$st_harga2 = cegah($rowst['item_harga']);
			$st_satuan = balikin($rowst['item_satuan']);
			$st_satuan2 = cegah($rowst['item_satuan']);
			$st_qty = balikin($rowst['qty']);
			$st_qty2 = cegah($rowst['qty']);
			$st_subtotal = balikin($rowst['subtotal']);
			$st_subtotal2 = cegah($rowst['subtotal']);
	


			if ($warna_set ==0)
				{
				$warna = $warna01;
				$warna_set = 1;
				}
			else
				{
				$warna = $warna02;
				$warna_set = 0;
				}
	
			$nomer = $nomer + 1;




			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td align="center">'.$nomer.'.</td>
			<td align="center">'.$st_nama.'</td>
			<td align="center">'.$arrbln[$st_pbln].' '.$st_pthn.'</td>
			<td align="right">'.$st_qty.' '.$st_satuan.'</td>
			<td align="right">'.xduit2($st_harga).'</td>
			<td align="right">'.xduit2($st_subtotal).'</td>
	        </tr>';
			}
		while ($rowst = mysqli_fetch_assoc($qst));
		}

	echo '</tbody>
	  </table>
	  </div>';
	



echo '<br>
<table width="100%" cellpadding="1" cellspacing="1" border="0">
<tr valign="top">
	<td align="left" width="250">

		<font size="2">
			<b>KETERANGAN</b>
		</font>
		
		
		<table width="100%" cellpadding="1" cellspacing="1" border="1">
		<tr valign="top">
		<td align="center">
			<b>TELAH DIBAYAR</b>
		</td>
		</tr>
		
		<tr valign="top">
		<td align="center">
			Pada Tanggal : 
			<br>
			<b>
			'.$cc2_ttgl3.' '.$arrbln1[$cc2_ttgl2].' '.$cc2_ttgl1.'
			</b>
		</td>
		</tr>
		
		</table>
		
		
		
		
		
	</td>
	
	<td width="10">
	&nbsp;
	</td>

	<td align="left">

		<br>
		<table width="100%" cellpadding="1" cellspacing="1" border="1">
		<tr valign="top">
		<td align="left">
			<b>SUBTOTAL</b>
		</td>
		<td align="right">
			<b>'.xduit2($cc_subtotal).'</b>
			<br>
		</td>
		</tr>
		
		<tr valign="top">
		<td align="left">
			DISCOUNT
			<br>
			
			Ppn 10%
			<br>
			
			Pajak BHP & USO 1,75%
			<br>
			
			SP 5,25%

		</td>
		<td align="right" width="100">
			'.xduit2($cc_diskon).'
			<br>
			
			'.xduit2($cc_ppn).'
			<br>
			
			'.xduit2($cc_pajak1).'
			<br>
			
			'.xduit2($cc_pajak2).'
			<br>
		</td>
		</tr>


		<tr>
		<td align="left">
			<b>Grand Total</b>
		</td>
		
		<td align="right">
			<b>'.xduit2($cc_total).'</b>
			<br>
		</td>
		</tr>
		
		</table>


		
		
	</td>
	
</tr>

</table>';





//jika satu digit
if (strlen($cc_ttgl3) == 1)
	{
	$cc_ttgl3x = "0$cc_ttgl3";
	}


//jika satu digit
if (strlen($cc_ttgl2) == 1)
	{
	$cc_ttgl2x = "0$cc_ttgl2";
	}




$date = strtotime("$cc_ttgl3x-$cc_ttgl2x-$cc_ttgl1");
//$date = strtotime("04-02-2022");//tgl-bln-tahun
$date = round(date('d', $date));

//echo $date;
$nilhari = $arrhari2[$date];



echo '<br>
<br>
<table width="100%" cellpadding="1" cellspacing="1" border="0">
<tr valign="top">
	<td align="left" width="250">
		
	</td>
	
	<td width="10">
	&nbsp;
	</td>

	<td align="center">

			<b>'.$nilhari.', '.$cc_ttgl3.' '.$arrbln1[$cc_ttgl2].' '.$cc_ttgl1.'</b>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			
			<u><b>FINANCE</b></u>
		
	</td>
	
</tr>

</table>';








//isi
$isi = ob_get_contents();
ob_end_clean();







$dompdf->loadHtml($isi);

// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();


// Melakukan output file Pdf




//auto save ke server
//777
chmod("filebox/tagihan", 0777);

$filename = "../../filebox/tagihan/terbayar-$tkd-$tahun$bulan$tanggal-$jam$menit$detik.pdf";


$output = $dompdf->output();
file_put_contents($filename, $output);



//755
chmod("filebox/tagihan", 0755);


//re-direct
xloc($filename);
exit();
?>