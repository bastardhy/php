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
$filenya = "bayar.php";
$judul = "[TAGIHAN] Pembayaran";
$judulku = "$judul";
$judulx = $judul;
$ubln = round(nosql($_REQUEST['ubln']));
$uthn = nosql($_REQUEST['uthn']);
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


//jika null, kasi bulan ini
if (empty($ubln))
	{
	//re-direct
	$ke = "$filenya?ubln=$bulan&uthn=$tahun";
	xloc($ke);
	exit();
	}








$limit = 5;


//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
	$ubln = cegah($_POST['ubln']);
	$uthn = cegah($_POST['uthn']);
	$kunci = cegah($_POST['kunci']);


	//re-direct
	$ke = "$filenya?ubln=$ubln&uthn=$uthn&kunci=$kunci";
	xloc($ke);
	exit();
	}







//jika simpan
if ($_POST['btnSMP2'])
	{
	$s = nosql($_POST['s']);
	$page = nosql($_POST['page']);
	$uskd = cegah($_POST['uskd']);
	$ubln = cegah($_POST['ubln']);
	$uthn = cegah($_POST['uthn']);


	$e_tgl3 = cegah($_POST['e_tgl3']);
	
	


	//pecah tanggal
	$tgl2_pecah = balikin($e_tgl3);
	$tgl2_pecahku = explode("-", $tgl2_pecah);
	$tgl2_tgl = trim($tgl2_pecahku[2]);
	$tgl2_bln = trim($tgl2_pecahku[1]);
	$tgl2_thn = trim($tgl2_pecahku[0]);
	$e_tgl3 = "$tgl2_thn:$tgl2_bln:$tgl2_tgl";




		
	//update
	mysqli_query($koneksi, "UPDATE user_tagihan SET tgl_bayar = '$e_tgl3', ".
								"tgl_bayar_postdate = '$today', ".
								"status = 'TERBAYAR' ".
								"WHERE user_kd = '$uskd' ".
								"AND periode_bln = '$ubln' ".
								"AND periode_thn = '$uthn'");
		


	//kasi log entri ///////////////////////////////////////////////////////////////////////////////////
	$ku_ket = cegah("[MENU : $judul]. PERIODE : $ubln/$uthn");			
	
	
	//insert
	mysqli_query($koneksi, "INSERT INTO user_log_entri(kd, ket, postdate) VALUES ".
					"('$x', '$ku_ket', '$today')");
	//kasi log login ///////////////////////////////////////////////////////////////////////////////////
	




	//re-direct
	$ke = "$filenya?s=detail&uskd=$uskd&ubln=$ubln&uthn=$uthn";
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




	//cek dulu, jika null, entri baru
	$qcc2 = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
										"WHERE user_kd = '$kdx' ".
										"AND periode_bln = '$ubln' ".
										"AND periode_thn = '$uthn'");
	$tcc2 = mysqli_num_rows($qcc2);
	
	//jika null
	if (empty($tcc2))
		{
		//insert
		mysqli_query($koneksi, "INSERT INTO user_tagihan(kd, user_kd, user_kode, user_nama, ".
								"user_alamat, user_koordinat, user_telp, user_wa, ".
								"kode, periode_bln, periode_thn, postdate) VALUES ".
								"('$x', '$uskd', '$e_kode', '$e_nama', ".
								"'$e_alamat', '$e_koordinat', '$e_telp', '$e_wa', ".
								"'$e_kode', '$ubln', '$uthn', '$today')");
			
		}

	?>
	
	
	
	
	<!-- Bootstrap core JavaScript -->
	<script src="<?php echo $sumber;?>/template/vendors/jquery/jquery.min.js"></script>
	<script src="<?php echo $sumber;?>/template/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>


	
	
	<div class="row">
		
	<?php
	echo '<div class="col-md-4">
	
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
	
	<div class="col-md-8">
	

	<?php
	echo '<form action="'.$filenya.'" method="post" name="formx2">
	<br>
	<br>
	<br>



    <div class="info-box mb-3 bg-success">
      <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

      <div class="info-box-content">
        <span class="info-box-number">

			Per Bulan : 
			<b>'.$arrbln[$ubln].' '.$uthn.'</b>

			</span>

      </div>
    </div>';
    


	
	
	echo '<div class="table-responsive">          
		<table class="table" border="1">
		<thead>
		
		<tr valign="top" bgcolor="'.$warnaheader.'">
		<td width="5"><strong><font color="'.$warnatext.'">NO</font></strong></td>
		<td align="center"><strong><font color="'.$warnatext.'">NAMA ITEM PRODUK</font></strong></td>
		<td align="center"><strong><font color="'.$warnatext.'">@ HARGA</font></strong></td>
		<td align="center"><strong><font color="'.$warnatext.'">QTY</font></strong></td>
		<td align="center"><strong><font color="'.$warnatext.'">SUBTOTAL</font></strong></td>
		</tr>
		</thead>
		<tbody>';

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
				echo '<td>'.$nomer.'</td>
				<td>'.$st_nama.'</td>
				<td align="right">'.xduit2($st_harga).'</td>
				<td align="right">'.$st_qty.' '.$st_satuan.'</td>
				<td align="right">'.xduit2($st_subtotal).'</td>
		        </tr>';
				}
			while ($rowst = mysqli_fetch_assoc($qst));
			}
		
		
		
		
		//update subtotal tagihan
		$qyuk = mysqli_query($koneksi, "SELECT SUM(subtotal) AS totalnya ".
											"FROM user_tagihan_item ".
											"WHERE user_kd = '$uskd' ".
											"AND periode_bln = '$ubln' ".
											"AND periode_thn = '$uthn'");
		$ryuk = mysqli_fetch_assoc($qyuk);
		$yuk_subtotal = balikin($ryuk['totalnya']);
		$yuk_pajak1 = round($yuk_subtotal * (175 / 10000));
		$yuk_pajak2 = round($yuk_subtotal * (525 / 10000));
		$yuk_total = $yuk_subtotal - ($yuk_pajak1 + $yuk_pajak2);   
		
		

		
		//detail tagihan
		$qyuk2 = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
											"WHERE user_kd = '$uskd' ".
											"AND periode_bln = '$ubln' ".
											"AND periode_thn = '$uthn'");
		$ryuk2 = mysqli_fetch_assoc($qyuk2);
		$yuk2_kd = balikin($ryuk2['kd']);
		$yuk2_diskon = balikin($ryuk2['discount']);
		$yuk2_ppn = balikin($ryuk2['ppn']);
		$yuk2_pajak1 = balikin($ryuk2['pajak1']);
		$yuk2_pajak2 = balikin($ryuk2['pajak2']);
		$yuk2_total = balikin($ryuk2['total']);
		$yuk2_tgl_bayar = balikin($ryuk2['tgl_bayar']);
		
		
		//jika null, kasi noll
		if (empty($yuk2_diskon))
			{
			$yuk2_diskon = 0;
			}
			
		if (empty($yuk2_ppn))
			{
			$yuk2_ppn = 0;
			}
			
		if (empty($yuk2_pajak1))
			{
			$yuk2_pajak1 = 0;
			}
			
		if (empty($yuk2_pajak2))
			{
			$yuk2_pajak2 = 0;
			}
		
		if (empty($yuk2_total))
			{
			$yuk2_total = $yuk_subtotal;
			}
		
		


		//jika satu
		if (strlen($ubln) == 1)
			{
			$ubln2 = "0$ubln";
			}		
			
		
		
		//tgl tagihan
		$e_tgl1 = "$uthn-$ubln2-15";
		$e_tgl2 = "$uthn-$ubln2-20";
		$e_tgl3 = $yuk2_tgl_bayar;
		
		echo '</tbody>
		  </table>
		  </div>
		
	
	
	
		
	
    <div class="info-box mb-3 bg-primary">

      <div class="info-box-content">
        <span class="info-box-number">
				

			<div class="row">
					
				<div class="col-md-4">
				
		
					<p>
					Tanggal Tagihan :
					<input name="e_tgl1" id="e_tgl1" type="date" value="'.$e_tgl1.'" size="10" class="btn btn-success" readonly>
					</p>
					
		
					<p>
					Tanggal Jatuh Tempo :
					<input name="e_tgl2" id="e_tgl2" type="date" value="'.$e_tgl2.'" size="10" class="btn btn-success" readonly>
					</p>
							
					<p>
					Tanggal Bayar :
					<input name="e_tgl3" id="e_tgl3" type="date" value="'.$e_tgl3.'" size="10" class="btn btn-warning" required>
					</p>
				</div>
				
				<div class="col-md-4">
		
						<p>
						SubTotal :
						<br>
						<input name="e_subtotal" id="e_subtotal" type="text" value="'.$yuk_subtotal.'" size="10" class="btn btn-block btn-success" readonly>
						</p>
						
						<p>
						Diskon :
						<br>
						<input name="e_diskon" id="e_diskon" type="text" value="'.$yuk2_diskon.'" size="10" class="btn btn-block btn-success" readonly>
						</p>
						
						
						<p>
						PPN 10% :
						<br>
						<input name="e_ppn" id="e_ppn" type="text" value="'.$yuk2_ppn.'" size="10" class="btn btn-block btn-success" readonly>
						</p>
						
				</div>
				
				
				<div class="col-md-4">
		
						<p>
						Pajak BHP & USO 1,75% :
						<br>
						<input name="e_pajak1" id="e_pajak1" type="text" value="'.$yuk2_pajak1.'" size="10" class="btn btn-block btn-success" readonly>
						</p>
						
						<p>
						SP 5,25% :
						<br>
						<input name="e_pajak2" id="e_pajak2" type="text" value="'.$yuk2_pajak2.'" size="10" class="btn btn-block btn-success" readonly>
						</p>
						
						
						<p>
						GRAND TOTAL :
						<br>
						<input name="e_total" id="e_total" type="text" value="'.$yuk2_total.'" size="10" class="btn btn-block btn-success" readonly>
						</p>
						
				</div>
				
				
			
			</div>
			

			</span>

      </div>
    </div>
    
	

	<input name="jml" type="hidden" value="'.$count.'">
	<input name="s" type="hidden" value="'.$s.'">
	<input name="uskd" type="hidden" value="'.$kdx.'">
	<input name="page" type="hidden" value="'.$page.'">
	<input name="ubln" type="hidden" value="'.$ubln.'">
	<input name="uthn" type="hidden" value="'.$uthn.'">
	<input name="uskd" type="hidden" value="'.$uskd.'">
	
	
	<input name="btnSMP2" type="submit" value="SIMPAN >>" class="btn btn-block btn-danger">
	
	
	<a href="bayar_pdf.php?tkd='.$yuk2_kd.'" target="_blank" class="btn btn-block btn-danger">PRINT PDF NOTA BAYAR >></a>

	
	
	</form>';
	?>
	

	</div>
	
	</div>


	<?php
	}
	













else
	{
	echo '<div class="row">
		<div class="col-md-12">';
		
	
		echo "<p>
		Bulan : 
		<br>
		<select name=\"ublnx\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";
		echo '<option value="'.$ubln.'" selected>'.$arrbln[$ubln].'</option>';
		
		for ($i=1;$i<=12;$i++)
			{
			echo '<option value="'.$filenya.'?ubln='.$i.'">'.$arrbln[$i].'</option>';
			}
					
		echo '</select>';
		
	
	
		echo "<select name=\"ublnx\" onChange=\"MM_jumpMenu('self',this,0)\" class=\"btn btn-warning\">";
		echo '<option value="'.$uthn.'" selected>'.$uthn.'</option>';
		
		for ($i=$tahun;$i<=$tahun+1;$i++)
			{
			echo '<option value="'.$filenya.'?ubln='.$ubln.'&uthn='.$i.'">'.$i.'</option>';
			}
					
		echo '</select>
		</p>		
		
		
		
		</div>
	</div>
	
	<hr>';
	
	
		
	if (empty($ubln))
		{
		echo '<font color="red">
		<h3>BULAN Belum Dipilih...!!</h3>
		</font>';
		}
	
	
	else if (empty($uthn))
		{
		echo '<font color="red">
		<h3>TAHUN Belum Dipilih...!!</h3>
		</font>';
		}
		
	else
		{
		//jika null
		if (empty($kunci))
			{
			$sqlcount = "SELECT * FROM user_tagihan ".
							"WHERE periode_bln = '$ubln' ".
							"AND periode_thn = '$uthn'";
			}
			
		else
			{
			$sqlcount = "SELECT * FROM user_tagihan ".
							"WHERE periode_bln = '$ubln' ".
							"AND periode_thn = '$uthn' ".
							"AND (user_kode LIKE '%$kunci%' ".
							"OR user_nama LIKE '%$kunci%' ".
							"OR user_alamat LIKE '%$kunci%' ".
							"OR user_telp LIKE '%$kunci%' ".
							"OR user_wa LIKE '%$kunci%' ".
							"OR user_koordinat LIKE '%$kunci%') ".
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
		<input name="ubln" type="hidden" value="'.$ubln.'">
		<input name="uthn" type="hidden" value="'.$uthn.'">
		<input name="btnCARI" type="submit" value="CARI" class="btn btn-danger">
		<input name="btnBTL" type="submit" value="RESET" class="btn btn-info">
		</p>';
			
		
		
		
		//jml user tagihan terbayar
		$qyuk21 = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
											"WHERE periode_bln = '$ubln' ".
											"AND periode_thn = '$uthn' ".
											"AND status = 'TERBAYAR'");
		$ryuk21 = mysqli_fetch_assoc($qyuk21);
		$tyuk21 = mysqli_num_rows($qyuk21);
		
		
		
		$jml_belum_bayar = $count - $tyuk21;
		
		 
		echo '[<font color="red"><b>'.$jml_belum_bayar.'</b></font> Belum Dibayar]. 
		
		[<font color="green"><b>'.$tyuk21.'</b></font> Dibayar].
		 
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
				$i_kd = nosql($data['user_kd']);
				$i_kode = balikin($data['user_kode']);
				$i_nama = balikin($data['user_nama']);
				$i_alamat = balikin($data['user_alamat']);
				$i_koordinat = balikin($data['user_koordinat']);
				$i_telp = balikin($data['user_telp']);
				$i_wa = balikin($data['user_wa']);
				$i_koordinat = balikin($data['user_koordinat']);
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
						[Postdate Instalasi : <b>'.$st_postdate.'</b>] 
						<hr>
						</li>';
						}
					while ($rowst = mysqli_fetch_assoc($qst));
					}
				
	
				echo '</ul>';
				
				
				
				//cek
				$qcc1 = mysqli_query($koneksi, "SELECT * FROM user_tagihan ".
													"WHERE user_kd = '$i_kd' ".
													"AND periode_bln = '$ubln' ".
													"AND periode_thn = '$uthn'");
				$rcc1 = mysqli_fetch_assoc($qcc1);
				$tcc1 = mysqli_num_rows($qcc1);
				$cc1_status = balikin($rcc1['status']);
				$cc1_bayar_tgl = balikin($rcc1['tgl_bayar']);
				$cc1_bayar_postdate = balikin($rcc1['tgl_bayar_postdate']);
				
				
				//jika null
				if (empty($tcc1))
					{
					$cc1_ket = "<font color='red'><b>TAGIHAN BELUM DIBUAT...</b></font>";
					}
					
				else
					{
					//jika terbayar
					if ($cc1_status == "TERBAYAR")
						{
						$cc1_ket = "<font color='green'><b>TERBAYAR</b>
						<br>
						[Tanggal Bayar : <b>$cc1_bayar_tgl</b>]. 
						<br>
						[Postdate : <b>$cc1_bayar_postdate</b>].</font>. ";
						}
					else
						{
						$cc1_ket = "<font color='red'><b>Belum Dibayar</b></font>";
						}
					}
				
				
				echo '<p>
				STATUS : 
				<br>
				'.$cc1_ket.'
				</p>';
				
				
				
							
				echo '<a href="'.$filenya.'?s=detail&ubln='.$ubln.'&uthn='.$uthn.'&page='.$page.'&uskd='.$i_kd.'" class="btn btn-block btn-danger" title="LIHAT RINCIAN...">LIHAT RINCIAN >></a>
	
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
		}
	}








//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");


//null-kan
xclose($koneksi);
exit();
?>