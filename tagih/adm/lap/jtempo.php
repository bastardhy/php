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
$filenya = "jtempo.php";
$judul = "[LAPORAN] Per Jatuh Tempo";
$judulku = "$judul";
$judulx = $judul;
$uskd = nosql($_REQUEST['uskd']);
$ikd = nosql($_REQUEST['ikd']);
$kd = nosql($_REQUEST['kd']);
$s = nosql($_REQUEST['s']);
$kunci = cegah($_REQUEST['kunci']);
$kunci2 = balikin($_REQUEST['kunci']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}











//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika export
//nek excel
if ($_POST['btnEX'])
	{
	//nilai
	$fileku = "lap_per_jatuh_tempo.xls";



	
	//isi *START
	ob_start();
	

	//tgl sekarang
	$tglku = "$tahun-$bulan-$tanggal";
	
	//jika null
	if (empty($kunci))
		{
		$sqlcount = "SELECT * FROM user_tagihan ".
						"WHERE tgl_expire < '$tglku' ".
						"AND status <> 'TERBAYAR'";
		}
		
	else
		{
		$sqlcount = "SELECT * FROM user_tagihan ".
						"WHERE tgl_expire < '$tglku' ".
						"AND status <> 'TERBAYAR' ".
						"AND (user_kode LIKE '%$kunci%' ".
						"OR user_nama LIKE '%$kunci%' ".
						"OR user_alamat LIKE '%$kunci%' ".
						"OR user_telp LIKE '%$kunci%' ".
						"OR user_wa LIKE '%$kunci%' ".
						"OR user_koordinat LIKE '%$kunci%') ".
						"ORDER BY tgl_expire DESC";
		}
		
		
	
	//query
	$limit = 10000;
	
	$p = new Pager();
	$start = $p->findStart($limit);
	
	$sqlresult = $sqlcount;
	
	$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
	$pages = $p->findPages($count, $limit);
	$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
	$pagelist = $p->pageList($_GET['page'], $pages, $target);
	$data = mysqli_fetch_array($result);
	
	
	
	echo '<div class="table-responsive">
	<h3>LAPORAN PER JATUH TEMPO</h3>          
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="200" align="center"><strong><font color="'.$warnatext.'">TGL. JATUH TEMPO</font></strong></td>
	<td width="200" align="center"><strong><font color="'.$warnatext.'">TOTAL</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">USER PELANGGAN</font></strong></td>
	</tr>
	</thead>
	<tbody>';
	
	if ($count != 0)
		{
		do 
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
	
			$nomer = $nomer + 1;
			$i_tgl_expire = balikin($data['tgl_expire']);
			$i_tgl_tagihan = balikin($data['tgl_tagihan']);
			$i_kd = nosql($data['user_kd']);
			$i_kode = balikin($data['user_kode']);
			$i_nama = balikin($data['user_nama']);
			$i_alamat = balikin($data['user_alamat']);
			$i_koordinat = balikin($data['user_koordinat']);
			$i_telp = balikin($data['user_telp']);
			$i_wa = balikin($data['user_wa']);
			$i_koordinat = balikin($data['user_koordinat']);
			$i_total = balikin($data['total']);
			$i_postdate = balikin($data['postdate']);
	
	
	
	
			//pecah tanggal
			$tgl2_pecah = balikin($i_tgl_tagihan);
			$tgl2_pecahku = explode("-", $tgl2_pecah);
			$tgl2_tgl = trim($tgl2_pecahku[2]);
			$tgl2_bln = trim($tgl2_pecahku[1]);
			$tgl2_thn = trim($tgl2_pecahku[0]);
	
		
	
	
	
	
			$i_filex1 = "$i_kd-1.jpg";
			$nil_foto1 = "$sumber/filebox/user/$i_kd/$i_filex1";	
	
			
			echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
			echo '<td>'.$i_tgl_expire.'</td>
			<td align="right">'.xduit2($i_total).'</td>
			<td>
			'.$i_kode.'. 
			'.$i_nama.'
			<hr>
			'.$i_alamat.'
			<br>
			Telp. '.$i_telp.'
			<br>
			WA. '.$i_wa.'
	
			</td>
	        </tr>';
			}
		while ($data = mysqli_fetch_assoc($result));
		}
	
	
	echo '</tbody>
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







//nek batal
if ($_POST['btnBTL'])
	{
	//re-direct
	xloc($filenya);
	exit();
	}





//jika cari
if ($_POST['btnCARI'])
	{
	//nilai
	$kunci = cegah($_POST['kunci']);


	//re-direct
	$ke = "$filenya?kunci=$kunci";
	xloc($ke);
	exit();
	}





/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//isi *START
ob_start();


//require
require("../../template/js/jumpmenu.js");
require("../../template/js/checkall.js");
require("../../template/js/swap.js");
?>


  
  <script>
  	$(document).ready(function() {
    $('#table-responsive').dataTable( {
        "scrollX": true
    } );
} );
  </script>
  
<?php
//view //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//tgl sekarang
$tglku = "$tahun-$bulan-$tanggal";

//jika null
if (empty($kunci))
	{
	$sqlcount = "SELECT * FROM user_tagihan ".
					"WHERE tgl_expire < '$tglku' ".
					"AND status <> 'TERBAYAR'";
	}
	
else
	{
	$sqlcount = "SELECT * FROM user_tagihan ".
					"WHERE tgl_expire < '$tglku' ".
					"AND status <> 'TERBAYAR' ".
					"AND (user_kode LIKE '%$kunci%' ".
					"OR user_nama LIKE '%$kunci%' ".
					"OR user_alamat LIKE '%$kunci%' ".
					"OR user_telp LIKE '%$kunci%' ".
					"OR user_wa LIKE '%$kunci%' ".
					"OR user_koordinat LIKE '%$kunci%') ".
					"ORDER BY tgl_expire DESC";
	}
	
	

//query
$limit = 5;

$p = new Pager();
$start = $p->findStart($limit);

$sqlresult = $sqlcount;

$count = mysqli_num_rows(mysqli_query($koneksi, $sqlcount));
$pages = $p->findPages($count, $limit);
$result = mysqli_query($koneksi, "$sqlresult LIMIT ".$start.", ".$limit);
$pagelist = $p->pageList($_GET['page'], $pages, $target);
$data = mysqli_fetch_array($result);



echo '<form action="'.$filenya.'" method="post" name="formx">
<p>
<input name="btnEX" type="submit" value="EXPORT EXCEL >>" class="btn btn-danger">
</p>
<hr>


<p>
<input name="kunci" type="text" value="'.$kunci2.'" size="20" class="btn btn-warning" placeholder="Kata Kunci...">
<input name="ubln" type="hidden" value="'.$ubln.'">
<input name="uthn" type="hidden" value="'.$uthn.'">
<input name="btnCARI" type="submit" value="CARI" class="btn btn-danger">
<input name="btnBTL" type="submit" value="RESET" class="btn btn-info">
</p>';
	


 
echo '<div class="table-responsive">          
<table class="table" border="1">
<thead>

<tr valign="top" bgcolor="'.$warnaheader.'">
<td width="200" align="center"><strong><font color="'.$warnatext.'">TGL. JATUH TEMPO</font></strong></td>
<td width="200" align="center"><strong><font color="'.$warnatext.'">TOTAL</font></strong></td>
<td align="center"><strong><font color="'.$warnatext.'">USER PELANGGAN</font></strong></td>
</tr>
</thead>
<tbody>';

if ($count != 0)
	{
	do 
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

		$nomer = $nomer + 1;
		$i_tgl_expire = balikin($data['tgl_expire']);
		$i_tgl_tagihan = balikin($data['tgl_tagihan']);
		$i_kd = nosql($data['user_kd']);
		$i_kode = balikin($data['user_kode']);
		$i_nama = balikin($data['user_nama']);
		$i_alamat = balikin($data['user_alamat']);
		$i_koordinat = balikin($data['user_koordinat']);
		$i_telp = balikin($data['user_telp']);
		$i_wa = balikin($data['user_wa']);
		$i_koordinat = balikin($data['user_koordinat']);
		$i_total = balikin($data['total']);
		$i_postdate = balikin($data['postdate']);




		//pecah tanggal
		$tgl2_pecah = balikin($i_tgl_tagihan);
		$tgl2_pecahku = explode("-", $tgl2_pecah);
		$tgl2_tgl = trim($tgl2_pecahku[2]);
		$tgl2_bln = trim($tgl2_pecahku[1]);
		$tgl2_thn = trim($tgl2_pecahku[0]);

	




		$i_filex1 = "$i_kd-1.jpg";
		$nil_foto1 = "$sumber/filebox/user/$i_kd/$i_filex1";	

		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>'.$i_tgl_expire.'</td>
		<td align="right">'.xduit2($i_total).'</td>
		<td>
		'.$i_kode.'. 
		'.$i_nama.'
		<hr>
		'.$i_alamat.'
		<br>
		Telp. '.$i_telp.'
		<br>
		WA. '.$i_wa.'

		</td>
        </tr>';
		}
	while ($data = mysqli_fetch_assoc($result));
	}


echo '</tbody>
  </table>
  </div>


<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
<td>
<strong><font color="#FF0000">'.$count.'</font></strong> Data. '.$pagelist.'
<br>
<br>

<input name="jml" type="hidden" value="'.$count.'">
<input name="s" type="hidden" value="'.$s.'">
<input name="kd" type="hidden" value="'.$kdx.'">
<input name="page" type="hidden" value="'.$page.'">
<input name="ubln" type="hidden" value="'.$ubln.'">
<input name="uthn" type="hidden" value="'.$uthn.'">

</td>
</tr>
</table>
</form>';







//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");


//null-kan
xclose($koneksi);
exit();
?>