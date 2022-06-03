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
$filenya = "kategori.php";
$judul = "[LAPORAN]. Per Kategori";
$judulku = "$judul";
$judulx = $judul;
$s = nosql($_REQUEST['s']);
$kd = nosql($_REQUEST['kd']);




$limit = 100;














//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//nek batal
if ($_POST['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}
	
	
	
	
	
//nek excel
if ($_POST['btnEX'])
	{
	$fileku = "lap_per_kategori.xls";



	
	//isi *START
	ob_start();
	
	//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	?>
	
	
		<script>
		$(document).ready(function() {
		  		
			$.noConflict();
		    
		});
		</script>
		  
		
	
	<?php
	echo '<div class="table-responsive">
	<h3>LAPORAN PER KATEGORI</h3>          
	<table class="table" border="1">
	<thead>
	
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<th><strong><font color="'.$warnatext.'">NAMA KATEGORI</font></strong></th>';
	
	
		//list 
		$qyuk2 = mysqli_query($koneksi, "SELECT DISTINCT(rw) AS desaku ".
											"FROM m_warga ".
											"ORDER BY round(rw) ASC");
		$ryuk2 = mysqli_fetch_assoc($qyuk2);
		
		do
			{
			//nilai
			$yuk2_desa = balikin($ryuk2['desaku']);
			
			
			echo '<td align="center"><strong><font color="'.$warnatext.'">RW.'.$yuk2_desa.'</font></strong></td>';
			}
		while ($ryuk2 = mysqli_fetch_assoc($qyuk2));
		
		
		echo '<td align="center"><strong><font color="'.$warnatext.'">TOTAL</font></strong></td>';
		echo '</tr>
	
	</thead>
	<tbody>';
	
	
	//query
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlcount = "SELECT DISTINCT(nama) AS thnku ".
					"FROM m_kategori ".
					"ORDER BY nama ASC";
	
	$sqlresult = $sqlcount;
	$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysqli_fetch_array($result);
	
	
	if ($count != 0)
		{
		do {
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
			$i_kd = nosql($data['kd']);
			$i_nama = balikin($data['thnku']);
			$i_nama2 = cegah($data['thnku']);
	
	
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$i_nama.'</td>';
			
	
			//list 
			$qyuk2 = mysqli_query($koneksi, "SELECT DISTINCT(rw) AS desaku ".
												"FROM m_warga ".
												"ORDER BY round(rw) ASC");
			$ryuk2 = mysqli_fetch_assoc($qyuk2);
			
			do
				{
				//nilai
				$yuk2_desa = balikin($ryuk2['desaku']);
				$yuk2_desa2 = cegah($ryuk2['desaku']);
				
	
				//nilainya
				$qyuk3 = mysqli_query($koneksi, "SELECT * FROM dokumen ".
													"WHERE kategori = '$i_nama2' ".
													"AND warga_rw = '$yuk2_desa2'");
				$tyuk3 = mysqli_num_rows($qyuk3);
				
				//jika ada
				if (!empty($tyuk3))
					{
					$tyuk3x = "<font color='green'>$tyuk3</font>";
					}
				else
					{
					$tyuk3x = $tyuk3;
					}
	
				
				echo '<td align="center"><strong><font color="'.$warnatext.'">'.$tyuk3x.'</font></strong></td>';
				}
			while ($ryuk2 = mysqli_fetch_assoc($qyuk2));
	
	
			//nilainya
			$qyuk3 = mysqli_query($koneksi, "SELECT * FROM dokumen ".
												"WHERE kategori = '$i_nama2'");
			$tyuk3 = mysqli_num_rows($qyuk3);
			
			//jika ada
			if (!empty($tyuk3))
				{
				$tyuk3x = "<font color='green'>$tyuk3</font>";
				}
			else
				{
				$tyuk3x = $tyuk3;
				}
	
			
			echo '<td align="center"><strong><font color="'.$warnatext.'">'.$tyuk3x.'</font></strong></td>';			
							
	        echo '</tr>';
			}
		while ($data = mysqli_fetch_assoc($result));
		}
	
	
	
	echo '</tbody>	
		<tfoot>
	
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<th><strong><font color="'.$warnatext.'">TOTAL</font></strong></th>';
		
		
			//list 
			$qyuk2 = mysqli_query($koneksi, "SELECT DISTINCT(rw) AS desaku ".
												"FROM m_warga ".
												"ORDER BY round(rw) ASC");
			$ryuk2 = mysqli_fetch_assoc($qyuk2);
			
			do
				{
				//nilai
				$yuk2_desa = balikin($ryuk2['desaku']);
				$yuk2_desa2 = cegah($ryuk2['desaku']);
				
	
				//nilainya
				$qyuk3 = mysqli_query($koneksi, "SELECT * FROM dokumen ".
													"WHERE warga_rw = '$yuk2_desa2'");
				$tyuk3 = mysqli_num_rows($qyuk3);
	
				//jika ada
				if (!empty($tyuk3))
					{
					$tyuk3x = "<font color='yellow'>$tyuk3</font>";
					}
				else
					{
					$tyuk3x = $tyuk3;
					}
	
				
				echo '<td align="center"><strong><font color="'.$warnatext.'">'.$tyuk3x.'</font></strong></td>';
				}
			while ($ryuk2 = mysqli_fetch_assoc($qyuk2));
				
	
	
			//nilainya
			$qyuk3 = mysqli_query($koneksi, "SELECT * FROM dokumen");
			$tyuk3 = mysqli_num_rows($qyuk3);
			$tyuk3x = $tyuk3;
	
			
			echo '<td align="center"><strong><font color="'.$warnatext.'">'.$tyuk3x.'</font></strong></td>
			</tr>';
	
	
		echo '</tfoot>
	
	  </table>
	
	
	
	
	
	</div>';
	
	
	//isi
	$isiku = ob_get_contents();
	ob_end_clean();


	
	
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=$fileku");
	echo $isiku;


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
	<th><strong><font color="'.$warnatext.'">NAMA KATEGORI</font></strong></th>';


	//list 
	$qyuk2 = mysqli_query($koneksi, "SELECT DISTINCT(rw) AS desaku ".
										"FROM m_warga ".
										"ORDER BY round(rw) ASC");
	$ryuk2 = mysqli_fetch_assoc($qyuk2);
	
	do
		{
		//nilai
		$yuk2_desa = balikin($ryuk2['desaku']);
		
		
		echo '<td align="center"><strong><font color="'.$warnatext.'">RW.'.$yuk2_desa.'</font></strong></td>';
		}
	while ($ryuk2 = mysqli_fetch_assoc($qyuk2));
	
	
	echo '<td align="center"><strong><font color="'.$warnatext.'">TOTAL</font></strong></td>';
	echo '</tr>

</thead>
<tbody>';


//query
$p = new Pager();
$start = $p->findStart($limit);

$sqlcount = "SELECT DISTINCT(nama) AS thnku ".
				"FROM m_kategori ".
				"ORDER BY nama ASC";

$sqlresult = $sqlcount;
$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
$pages = $p->findPages($count, $limit);
$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
$pagelist = $p->pageList($_GET['page'], $pages, $target);
$data = mysqli_fetch_array($result);


if ($count != 0)
	{
	do {
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
		$i_kd = nosql($data['kd']);
		$i_nama = balikin($data['thnku']);
		$i_nama2 = cegah($data['thnku']);


		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$i_nama.'</td>';
		

		//list 
		$qyuk2 = mysqli_query($koneksi, "SELECT DISTINCT(rw) AS desaku ".
											"FROM m_warga ".
											"ORDER BY round(rw) ASC");
		$ryuk2 = mysqli_fetch_assoc($qyuk2);
		
		do
			{
			//nilai
			$yuk2_desa = balikin($ryuk2['desaku']);
			$yuk2_desa2 = cegah($ryuk2['desaku']);
			

			//nilainya
			$qyuk3 = mysqli_query($koneksi, "SELECT * FROM dokumen ".
												"WHERE kategori = '$i_nama2' ".
												"AND warga_rw = '$yuk2_desa2'");
			$tyuk3 = mysqli_num_rows($qyuk3);
			
			//jika ada
			if (!empty($tyuk3))
				{
				$tyuk3x = "<font color='green'>$tyuk3</font>";
				}
			else
				{
				$tyuk3x = $tyuk3;
				}

			
			echo '<td align="center"><strong><font color="'.$warnatext.'">'.$tyuk3x.'</font></strong></td>';
			}
		while ($ryuk2 = mysqli_fetch_assoc($qyuk2));


		//nilainya
		$qyuk3 = mysqli_query($koneksi, "SELECT * FROM dokumen ".
											"WHERE kategori = '$i_nama2'");
		$tyuk3 = mysqli_num_rows($qyuk3);
		
		//jika ada
		if (!empty($tyuk3))
			{
			$tyuk3x = "<font color='green'>$tyuk3</font>";
			}
		else
			{
			$tyuk3x = $tyuk3;
			}

		
		echo '<td align="center"><strong><font color="'.$warnatext.'">'.$tyuk3x.'</font></strong></td>';			
						
        echo '</tr>';
		}
	while ($data = mysqli_fetch_assoc($result));
	}



echo '</tbody>	
	<tfoot>

	<tr valign="top" bgcolor="'.$warnaheader.'">
	<th><strong><font color="'.$warnatext.'">TOTAL</font></strong></th>';
	
	
		//list 
		$qyuk2 = mysqli_query($koneksi, "SELECT DISTINCT(rw) AS desaku ".
											"FROM m_warga ".
											"ORDER BY round(rw) ASC");
		$ryuk2 = mysqli_fetch_assoc($qyuk2);
		
		do
			{
			//nilai
			$yuk2_desa = balikin($ryuk2['desaku']);
			$yuk2_desa2 = cegah($ryuk2['desaku']);
			

			//nilainya
			$qyuk3 = mysqli_query($koneksi, "SELECT * FROM dokumen ".
												"WHERE warga_rw = '$yuk2_desa2'");
			$tyuk3 = mysqli_num_rows($qyuk3);

			//jika ada
			if (!empty($tyuk3))
				{
				$tyuk3x = "<font color='yellow'>$tyuk3</font>";
				}
			else
				{
				$tyuk3x = $tyuk3;
				}

			
			echo '<td align="center"><strong><font color="'.$warnatext.'">'.$tyuk3x.'</font></strong></td>';
			}
		while ($ryuk2 = mysqli_fetch_assoc($qyuk2));
			


		//nilainya
		$qyuk3 = mysqli_query($koneksi, "SELECT * FROM dokumen");
		$tyuk3 = mysqli_num_rows($qyuk3);
		$tyuk3x = $tyuk3;

		
		echo '<td align="center"><strong><font color="'.$warnatext.'">'.$tyuk3x.'</font></strong></td>
		</tr>';


	echo '</tfoot>

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