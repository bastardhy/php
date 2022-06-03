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
$filenya = "user.php";
$judul = "[HUTANG] Data User/Pelanggan";
$judulku = "$judul";
$judulx = $judul;
$kd = nosql($_REQUEST['kd']);
$s = nosql($_REQUEST['s']);
$kunci = cegah($_REQUEST['kunci']);
$kunci2 = balikin($_REQUEST['kunci']);
$page = nosql($_REQUEST['page']);
if ((empty($page)) OR ($page == "0"))
	{
	$page = "1";
	}



$limit = 5;


//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//netralkan dulu
mysqli_query($koneksi, "UPDATE m_user SET total_hutang = ''");
mysqli_query($koneksi, "UPDATE m_user SET jml_tagihan = ''");




//cek yg jatuh tempo... itu hutang
//tgl sekarang
$tglku = "$tahun-$bulan-$tanggal";


$qku = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
								"WHERE tgl_expire < '$tglku' ".
								"AND status <> 'TERBAYAR' ".
								"ORDER BY tgl_expire DESC");
$rku = mysqli_fetch_assoc($qku);

do
	{
	//nilai
	$ku_uskd = balikin($rku['user_kd']);
	
	
	//ketahui besar tagihan expire
	$qyuk = mysqli_query($koneksi, "SELECT SUM(total) AS totalnya ".
										"FROM user_tagihan ".
										"WHERE user_kd = '$ku_uskd' ".
										"AND tgl_expire < '$tglku' ".
										"AND status <> 'TERBAYAR'");
	$ryuk = mysqli_fetch_assoc($qyuk);
	$yuk_total = balikin($ryuk['totalnya']);
	
	
	
	
	//ketahui jml tagihan
	$qyuk2 = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
										"WHERE user_kd = '$ku_uskd'");
	$ryuk2 = mysqli_fetch_assoc($qyuk2);
	$tyuk2 = mysqli_num_rows($qyuk2);
	
	
	
	//update
	mysqli_query($koneksi, "UPDATE m_user SET jml_tagihan = '$tyuk2', ".
								"total_hutang = '$yuk_total' ".
								"WHERE kd = '$ku_uskd'");
	
		
	}
while ($rku = mysqli_fetch_assoc($qku));














//kasi log entri ///////////////////////////////////////////////////////////////////////////////////
$ku_ket = cegah("[MENU : $judul].");			


//insert
mysqli_query($koneksi, "INSERT INTO user_log_entri(kd, ket, postdate) VALUES ".
				"('$x', '$ku_ket', '$today')");
//kasi log login ///////////////////////////////////////////////////////////////////////////////////










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
//jika null
if (empty($kunci))
	{
	$sqlcount = "SELECT * FROM m_user ".
					"ORDER BY kode ASC";
	}
	
else
	{
	$sqlcount = "SELECT * FROM m_user ".
					"WHERE kode LIKE '%$kunci%' ".
					"OR nama LIKE '%$kunci%' ".
					"OR alamat LIKE '%$kunci%' ".
					"OR telp LIKE '%$kunci%' ".
					"OR wa LIKE '%$kunci%' ".
					"OR koordinat LIKE '%$kunci%' ".
					"ORDER BY kode ASC";
	}
	
	

//query
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
<input name="kunci" type="text" value="'.$kunci2.'" size="20" class="btn btn-warning" placeholder="Kata Kunci...">
<input name="btnCARI" type="submit" value="CARI" class="btn btn-danger">
<input name="btnBTL" type="submit" value="RESET" class="btn btn-info">
</p>
	

<div class="table-responsive">          
<table class="table" border="1">
<thead>

<tr valign="top" bgcolor="'.$warnaheader.'">
<td width="50"><strong><font color="'.$warnatext.'">FOTO</font></strong></td>
<td width="50"><strong><font color="'.$warnatext.'">KODE</font></strong></td>
<td align="center"><strong><font color="'.$warnatext.'">NAMA</font></strong></td>
<td align="center"><strong><font color="'.$warnatext.'">ALAMAT</font></strong></td>
<td align="center"><strong><font color="'.$warnatext.'">TELP</font></strong></td>
<td align="center"><strong><font color="'.$warnatext.'">WA</font></strong></td>
<td align="center"><strong><font color="'.$warnatext.'">JML. HUTANG JATUH TEMPO</font></strong></td>
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
		$i_kd = nosql($data['kd']);
		$i_kode = balikin($data['kode']);
		$i_nama = balikin($data['nama']);
		$i_alamat = balikin($data['alamat']);
		$i_koordinat = balikin($data['koordinat']);
		$i_telp = balikin($data['telp']);
		$i_wa = balikin($data['wa']);
		$i_koordinat = balikin($data['koordinat']);
		$i_postdate = balikin($data['postdate']);
		$i_hutang = balikin($data['total_hutang']);


		$i_filex1 = "$i_kd-1.jpg";
		$nil_foto1 = "$sumber/filebox/user/$i_kd/$i_filex1";	

		
		echo "<tr valign=\"top\" bgcolor=\"$warna\" onmouseover=\"this.bgColor='$warnaover';\" onmouseout=\"this.bgColor='$warna';\">";
		echo '<td>
		
		<img src="'.$nil_foto1.'" width="150" height="150">
		
		</td>
		<td>'.$i_kode.'</td>
		<td>'.$i_nama.'</td>
		<td>
		'.$i_alamat.'
		<br>
		
		<hr>
		KOORDINAT : 
		<br>
		'.$i_koordinat.'
		</td>
		<td>'.$i_telp.'</td>
		<td>'.$i_wa.'</td>
		<td align="right"><b>'.xduit2($i_hutang).'</b></td>
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