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
$filenya = "paket.php";
$judul = "[USER] Data Paket";
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



$limit = 5;


//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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







//jika simpan
if ($_POST['btnSMP2'])
	{
	$s = nosql($_POST['s']);
	$page = nosql($_POST['page']);
	$uskd = cegah($_POST['uskd']);
	$e_item = cegah($_POST['e_item']);
	$e_qty = cegah($_POST['e_qty']);



	//detail user
	$qx = mysqli_query($koneksi, "SELECT * FROM m_user ".
										"WHERE kd = '$uskd'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_kode = cegah($rowx['kode']);
	$e_nama = cegah($rowx['nama']);
	$e_alamat = cegah($rowx['alamat']);
	$e_telp = cegah($rowx['telp']);
	$e_wa = cegah($rowx['wa']);
	$e_koordinat = cegah($rowx['koordinat']);
		
	
	
	
	
	//detail item
	$qx = mysqli_query($koneksi, "SELECT * FROM m_item ".
										"WHERE kd = '$e_item'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_kode2 = cegah($rowx['kode']);
	$e_nama2 = cegah($rowx['nama']);
	$e_harga2 = cegah($rowx['harga']);
	$e_satuan = cegah($rowx['satuan']);


	
	//subtotal
	$e_subtotal = $e_harga2 * $e_qty;
	
	

	//insert
	mysqli_query($koneksi, "INSERT INTO user_item(kd, user_kd, user_kode, user_nama, ".
							"user_alamat, user_koordinat, user_telp, user_wa, ".
							"item_kd, item_kode, item_nama, item_harga, item_satuan, ".
							"harga, qty, subtotal, postdate) VALUES ".
							"('$x', '$uskd', '$e_kode', '$e_nama', ".
							"'$e_alamat', '$e_koordinat', '$e_telp', '$e_wa', ".
							"'$e_item', '$e_kode2', '$e_nama2', '$e_harga2', '$e_satuan', ".
							"'$e_harga2', '$e_qty', '$e_subtotal', '$today')");


	//re-direct
	$ke = "$filenya?s=detail&uskd=$uskd";
	xloc($ke);
	exit();
	}







//hapus
if ($s == "hapus")
	{
	//hapus
	mysqli_query($koneksi, "DELETE FROM user_item ".
								"WHERE user_kd = '$uskd' ".
								"AND kd = '$ikd'");
								

	//re-direct
	$ke = "$filenya?s=detail&uskd=$uskd";
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
//jika detail
if ($s == "detail")
	{
	$kdx = nosql($_REQUEST['uskd']);

	$qx = mysqli_query($koneksi, "SELECT * FROM m_user ".
										"WHERE kd = '$kdx'");
	$rowx = mysqli_fetch_assoc($qx);
	$e_kode = balikin($rowx['kode']);
	$e_nama = balikin($rowx['nama']);
	$e_alamat = balikin($rowx['alamat']);
	$e_telp = balikin($rowx['telp']);
	$e_wa = balikin($rowx['wa']);
	$e_koordinat = balikin($rowx['koordinat']);


	$i_filex1 = "$kdx-1.jpg";
	$nil_foto1 = "$sumber/filebox/item/$kdx/$i_filex1";				


	?>
	
	
	
	
	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo $sumber;?>/template/vendors/jquery/jquery.min.js"></script>
	<script src="<?php echo $sumber;?>/template/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>

	
	<script>
	$(document).ready(function () {
		

	
		$('#e_qty').bind('keyup paste', function(){
			this.value = this.value.replace(/[^0-9]/g, '');
			});
			


			
	});
	</script>		
					

	

	
	
	<div class="row">
		
	<?php
	echo '<div class="col-md-6">
	
	<p>
	<a href="'.$filenya.'" class="btn btn-danger"><< DAFTAR USER LAINNYA</a> 
	</p>
	<hr>
	
	<p>
	KODE : 
	<br>
	<b>'.$e_kode.'</b>
	</p>


	<p>
	NAMA : 
	<br>
	<b>'.$e_nama.'</b>
	</p>

	<p>
	ALAMAT : 
	<br>
	<b>'.$e_alamat.'</b>
	</p>

	<p>
	KOORDINAT : 
	<br>
	<b>'.$e_koordinat.'</b>
	</p>
	

	<p>
	TELEPON : 
	<br>
	<b>'.$e_telp.'</b>
	</p>
	
	
	<p>
	WA : 
	<br>
	<b>'.$e_wa.'</b>
	</p>';	
	?>
		
	
	
	</div>
	
	<div class="col-md-6">
	

	<?php
	echo '<form action="'.$filenya.'" method="post" name="formx2">
	<br>
	<br>
	<br>



    <div class="info-box mb-3 bg-primary">
      <span class="info-box-icon"><i class="fa fa-archive"></i></span>

      <div class="info-box-content">
        <span class="info-box-number">
				
			<select name="e_item" id="e_item" class="btn btn-block btn-warning" required>
			<option value="" selected>-ITEM PRODUK-</option>';
			
			//list
			$qst = mysqli_query($koneksi, "SELECT * FROM m_item ".
												"ORDER BY nama ASC");
			$rowst = mysqli_fetch_assoc($qst);
			
			do
				{
				$st_kd = nosql($rowst['kd']);
				$st_nama = balikin($rowst['nama']);
				$st_harga = balikin($rowst['harga']);
				$st_satuan = balikin($rowst['satuan']);
			
	
				echo '<option value="'.$st_kd.'">'.$st_nama.' ['.xduit2($st_harga).'] ['.$st_satuan.']</option>';
				}
			while ($rowst = mysqli_fetch_assoc($qst));
			
			echo '</select>
			
			<br>
			
			Qty :
			<input name="e_qty" id="e_qty" type="text" value="'.$e_qty.'" size="5" class="btn btn-warning" required>

			</span>

      </div>
    </div>
    
	

	<input name="jml" type="hidden" value="'.$count.'">
	<input name="s" type="hidden" value="'.$s.'">
	<input name="uskd" type="hidden" value="'.$kdx.'">
	<input name="page" type="hidden" value="'.$page.'">
	
	
	<input name="btnSMP2" type="submit" value="TAMBAH >>" class="btn btn-block btn-danger">

	
	
	</form>
	
	<hr>
	
	<ol>';
	
	
	
	//list
	$qst = mysqli_query($koneksi, "SELECT * FROM user_item ".
										"WHERE user_kd = '$kdx' ".
										"ORDER BY item_nama ASC");
	$rowst = mysqli_fetch_assoc($qst);
	$tst = mysqli_num_rows($qst);
	
	//jika ada
	if (!empty($tst))
		{
		do
			{
			$st_kd = nosql($rowst['kd']);
			$st_nama = balikin($rowst['item_nama']);
			$st_harga = balikin($rowst['item_harga']);
			$st_satuan = balikin($rowst['item_satuan']);
			$st_qty = balikin($rowst['qty']);
		
	
			echo '<li>'.$st_nama.' 
			<br>[@ '.xduit2($st_harga).'] ['.$st_satuan.'] [Qty : '.$st_qty.'] 
			<br>
			<a href="'.$filenya.'?s=hapus&uskd='.$kdx.'&ikd='.$st_kd.'" class="btn btn-danger">HAPUS >></a>
			<br>
			</li>';
			}
		while ($rowst = mysqli_fetch_assoc($qst));
		}

	?>

	</ol>

	</div>
	
	</div>


	<?php
	}
	













else
	{
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
	<td align="center"><strong><font color="'.$warnatext.'">PAKET ITEM PRODUK</font></strong></td>
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
			<td>
			
			
			<ul>';
		
			//list
			$qst = mysqli_query($koneksi, "SELECT * FROM user_item ".
												"WHERE user_kd = '$i_kd' ".
												"ORDER BY item_nama ASC");
			$rowst = mysqli_fetch_assoc($qst);
			$tst = mysqli_num_rows($qst);
			
			//jika ada
			if (!empty($tst))
				{
				do
					{
					$st_kd = nosql($rowst['kd']);
					$st_nama = balikin($rowst['item_nama']);
					$st_harga = balikin($rowst['item_harga']);
					$st_satuan = balikin($rowst['item_satuan']);
					$st_qty = balikin($rowst['qty']);
					$st_postdate = balikin($rowst['postdate']);
				
			
					echo '<li>'.$st_nama.' 
					<br>[@ <b>'.xduit2($st_harga).'</b>] [SATUAN : <b>'.$st_satuan.'</b>] [Qty : <b>'.$st_qty.'</b>]
					<br>
					[Postdate : <b>'.$st_postdate.'</b>] 
					<hr>
					</li>';
					}
				while ($rowst = mysqli_fetch_assoc($qst));
				}
			

			echo '</ul>';
			
						
			echo '<a href="'.$filenya.'?s=detail&page='.$page.'&uskd='.$i_kd.'" class="btn btn-block btn-danger" title="EDIT PAKET...">EDIT PAKET >></a>

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

	</td>
	</tr>
	</table>
	</form>';
	}








//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");


//null-kan
xclose($koneksi);
exit();
?>