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

require("../../inc/config.php");
require("../../inc/fungsi.php");
require("../../inc/koneksi.php");
require("../../inc/cek/adm.php");
require("../../inc/class/paging.php");
$tpl = LoadTpl("../../template/adm.html");

nocache;

//nilai
$filenya = "thn.php";
$judul = "[LAPORAN]. Per Tahun";
$judulku = "$judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$kd = nosql($_REQUEST['kd']);




$limit = 100;














//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek excel
if ($_POST['btnEX'])
	{
	//nilai
	$fileku = "lap_per_tahun.xls";



	
	//isi *START
	ob_start();
	

	echo '<div class="table-responsive">
	<h3>LAPORAN PER TAHUN</h3>
	                   
	<table class="table" border="1">
	<thead>
	
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<td width="100"><strong><font color="'.$warnatext.'">TAHUN</font></strong></th>
		<td width="200"><strong><font color="'.$warnatext.'">JUMLAH USER</font></strong></td>
		<td width="200"><strong><font color="'.$warnatext.'">JUMLAH TAGIHAN</font></strong></td>
		<td><strong><font color="'.$warnatext.'">TOTAL NOMINAL</font></strong></td>
		</tr>
	
	</thead>
	<tbody>';
	
	
	
	for ($k=$tahun-1;$k<=$tahun;$k++)
		{
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
	
	
	
	
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$k.'</td>';
		
		//jumlahnya user
		$qku2 = mysqli_query($koneksi, "SELECT DISTINCT(user_kd) AS totalnya ".
										"FROM user_tagihan ".
										"WHERE round(DATE_FORMAT(tgl_tagihan, '%Y')) = '$k'");
		$rku2 = mysqli_fetch_assoc($qku2);
		$tku2 = mysqli_num_rows($qku2);
		
		
		//jumlahnya
		$qku = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
										"WHERE round(DATE_FORMAT(tgl_tagihan, '%Y')) = '$k'");
		$rku = mysqli_fetch_assoc($qku);
		$tku = mysqli_num_rows($qku);
		
		
		
		
		//jumlahnya nominal
		$qku3 = mysqli_query($koneksi, "SELECT SUM(total) AS totalnya ".
										"FROM user_tagihan ".
										"WHERE round(DATE_FORMAT(tgl_tagihan, '%Y')) = '$k'");
		$rku3 = mysqli_fetch_assoc($qku3);
		$ku3_totalnya = balikin($rku3['totalnya']);
		
		echo '<td align="left"><strong><font color="'.$warnatext.'">'.$tku2.'</font></strong></td>
		<td align="left"><strong><font color="'.$warnatext.'">'.$tku.'</font></strong></td>
		<td align="left"><strong><font color="'.$warnatext.'">'.xduit2($ku3_totalnya).'</font></strong></td>
		</tr>';
		}
	
	
	
	
		//jumlahnya user
		$qku2 = mysqli_query($koneksi, "SELECT DISTINCT(user_kd) AS totalnya ".
										"FROM user_tagihan");
		$rku2 = mysqli_fetch_assoc($qku2);
		$tku2 = mysqli_num_rows($qku2);
		
		
		//jumlahnya
		$qku = mysqli_query($koneksi, "SELECT * FROM user_tagihan");
		$rku = mysqli_fetch_assoc($qku);
		$tku = mysqli_num_rows($qku);
		
		
		
		
		//jumlahnya nominal
		$qku3 = mysqli_query($koneksi, "SELECT SUM(total) AS totalnya ".
										"FROM user_tagihan");
		$rku3 = mysqli_fetch_assoc($qku3);
		$ku3_totalnya = balikin($rku3['totalnya']);
	
	
	
	echo '</tbody>	
		<tfoot>
	
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<th><strong><font color="'.$warnatext.'">TOTAL</font></strong></th>
		<th><strong><font color="'.$warnatext.'">'.$tku2.'</font></strong></th>
		<th><strong><font color="'.$warnatext.'">'.$tku.'</font></strong></th>
		<th><strong><font color="'.$warnatext.'">'.xduit2($ku3_totalnya).'</font></strong></th>
		</tr>
		
		</tfoot>
	
	  </table>';
	

	




	
	//isi
	$isiku = ob_get_contents();
	ob_end_clean();


	
	
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=$fileku");
	echo $isiku;


	exit();
	}	












//nek batal
if ($_POST['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







//isi *START
ob_start();

//require
require("../../inc/js/jumpmenu.js");
require("../../inc/js/checkall.js");
require("../../inc/js/swap.js");


//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>


	<script>
	$(document).ready(function() {
	  		
		$.noConflict();
	    
	});
	</script>
	  
	

<?php
echo '<form action="'.$filenya.'" method="post" name="formx">

<input name="btnEX" type="submit" value="EXPORT EXCEL >>" class="btn btn-danger">


<div class="table-responsive">          
<table class="table" border="1">
<thead>

	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="100"><strong><font color="'.$warnatext.'">TAHUN</font></strong></th>
	<td width="200"><strong><font color="'.$warnatext.'">JUMLAH USER</font></strong></td>
	<td width="200"><strong><font color="'.$warnatext.'">JUMLAH TAGIHAN</font></strong></td>
	<td><strong><font color="'.$warnatext.'">TOTAL NOMINAL</font></strong></td>
	</tr>

</thead>
<tbody>';



for ($k=$tahun-1;$k<=$tahun;$k++)
	{
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




	echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
	echo '<td>'.$k.'</td>';
	
	//jumlahnya user
	$qku2 = mysqli_query($koneksi, "SELECT DISTINCT(user_kd) AS totalnya ".
									"FROM user_tagihan ".
									"WHERE round(DATE_FORMAT(tgl_tagihan, '%Y')) = '$k'");
	$rku2 = mysqli_fetch_assoc($qku2);
	$tku2 = mysqli_num_rows($qku2);
	
	
	//jumlahnya
	$qku = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
									"WHERE round(DATE_FORMAT(tgl_tagihan, '%Y')) = '$k'");
	$rku = mysqli_fetch_assoc($qku);
	$tku = mysqli_num_rows($qku);
	
	
	
	
	//jumlahnya nominal
	$qku3 = mysqli_query($koneksi, "SELECT SUM(total) AS totalnya ".
									"FROM user_tagihan ".
									"WHERE round(DATE_FORMAT(tgl_tagihan, '%Y')) = '$k'");
	$rku3 = mysqli_fetch_assoc($qku3);
	$ku3_totalnya = balikin($rku3['totalnya']);
	
	echo '<td align="left"><strong><font color="'.$warnatext.'">'.$tku2.'</font></strong></td>
	<td align="left"><strong><font color="'.$warnatext.'">'.$tku.'</font></strong></td>
	<td align="left"><strong><font color="'.$warnatext.'">'.xduit2($ku3_totalnya).'</font></strong></td>
	</tr>';
	}




	//jumlahnya user
	$qku2 = mysqli_query($koneksi, "SELECT DISTINCT(user_kd) AS totalnya ".
									"FROM user_tagihan");
	$rku2 = mysqli_fetch_assoc($qku2);
	$tku2 = mysqli_num_rows($qku2);
	
	
	//jumlahnya
	$qku = mysqli_query($koneksi, "SELECT * FROM user_tagihan");
	$rku = mysqli_fetch_assoc($qku);
	$tku = mysqli_num_rows($qku);
	
	
	
	
	//jumlahnya nominal
	$qku3 = mysqli_query($koneksi, "SELECT SUM(total) AS totalnya ".
									"FROM user_tagihan");
	$rku3 = mysqli_fetch_assoc($qku3);
	$ku3_totalnya = balikin($rku3['totalnya']);



echo '</tbody>	
	<tfoot>

	<tr valign="top" bgcolor="'.$warnaheader.'">
	<th><strong><font color="'.$warnatext.'">TOTAL</font></strong></th>
	<th><strong><font color="'.$warnatext.'">'.$tku2.'</font></strong></th>
	<th><strong><font color="'.$warnatext.'">'.$tku.'</font></strong></th>
	<th><strong><font color="'.$warnatext.'">'.xduit2($ku3_totalnya).'</font></strong></th>
	</tr>
	
	</tfoot>

  </table>





<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
<input name="jml" type="hidden" value="'.$count.'">
</td>
</tr>
</table>


</div>



</form>';


//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");



//null-kan
xfree($qbw);
xclose($koneksi);
exit();
?>