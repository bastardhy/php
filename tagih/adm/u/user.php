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
$judul = "[USER] Data User/Pelanggan";
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
//kasi log entri ///////////////////////////////////////////////////////////////////////////////////
$ku_ket = cegah("[MENU : $judul].");			


//insert
mysqli_query($koneksi, "INSERT INTO user_log_entri(kd, ket, postdate) VALUES ".
				"('$x', '$ku_ket', '$today')");
//kasi log login ///////////////////////////////////////////////////////////////////////////////////





//jika import
if ($_POST['btnIM'])
	{
	//re-direct
	$ke = "$filenya?s=import";
	xloc($ke);
	exit();
	}












//lama
//import sekarang
if ($_POST['btnIMX'])
	{
	$filex_namex2 = strip(strtolower($_FILES['filex_xls']['name']));

	//nek null
	if (empty($filex_namex2))
		{
		//re-direct
		$pesan = "Input Tidak Lengkap. Harap Diulangi...!!";
		$ke = "$filenya?s=import";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//deteksi .xls
		$ext_filex = substr($filex_namex2, -4);

		if ($ext_filex == ".xls")
			{
			//nilai
			$path1 = "../../filebox";
			$path2 = "../../filebox/excel";
			chmod($path1,0777);
			chmod($path2,0777);

			//nama file import, diubah menjadi baru...
			$filex_namex2 = "user.xls";

			//mengkopi file
			copy($_FILES['filex_xls']['tmp_name'],"../../filebox/excel/$filex_namex2");

			//chmod
            $path3 = "../../filebox/excel/$filex_namex2";
			chmod($path1,0755);
			chmod($path2,0777);
			chmod($path3,0777);

			//file-nya...
			$uploadfile = $path3;





			//require
			require('../../inc/class/PHPExcel.php');
			require('../../inc/class/PHPExcel/IOFactory.php');


			  // load excel
			  $load = PHPExcel_IOFactory::load($uploadfile);
			  $sheets = $load->getActiveSheet()->toArray(null,true,true,true);
			
			  $i = 1;
			  foreach ($sheets as $sheet) 
			  	{
			    // karena data yang di excel di mulai dari baris ke 2
			    // maka jika $i lebih dari 1 data akan di masukan ke database
			    if ($i > 1) 
			    	{
				      // nama ada di kolom A
				      // sedangkan alamat ada di kolom B
				      $i_no = cegah($sheet['A']);
				      $i_kode = cegah($sheet['B']);
				      $i_nama = cegah($sheet['C']);
				      $i_alamat = cegah($sheet['D']);
				      $i_telp = cegah($sheet['E']);
				      $i_wa = cegah($sheet['F']);
				      $i_koordinat = cegah($sheet['G']);


				      $i_xyz = "$i_kode$i_nama";
					  


					//insert
					mysqli_query($koneksi, "INSERT INTO m_user(kd, kode, nama, ".
											"alamat, telp, wa, koordinat, postdate) VALUES ".
											"('$i_xyz', '$i_kode', '$i_nama', ".
											"'$i_alamat', '$i_telp', '$i_wa', '$i_koordinat', '$today')");

					  
				    }
			
			    $i++;
			  }





			//hapus file, jika telah import
			$path1 = "../../filebox/excel/$filex_namex2";
			chmod($path1,0777);
			unlink ($path1);


			//re-direct
			xloc($filenya);
			exit();
			}
		else
			{
			//salah
			$pesan = "Bukan File .xls . Harap Diperhatikan...!!";
			$ke = "$filenya?s=import";
			pekem($pesan,$ke);
			exit();
			}
		}
	}











//jika export
//export
if ($_POST['btnEX'])
	{
	//require
	require('../../inc/class/excel/OLEwriter.php');
	require('../../inc/class/excel/BIFFwriter.php');
	require('../../inc/class/excel/worksheet.php');
	require('../../inc/class/excel/workbook.php');


	//nama file e...
	$i_filename = "user.xls";
	$i_judul = "user";
	



	//header file
	function HeaderingExcel($i_filename)
		{
		header("Content-type:application/vnd.ms-excel");
		header("Content-Disposition:attachment;filename=$i_filename");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Pragma: public");
		}

	
	
	
	//bikin...
	HeaderingExcel($i_filename);
	$workbook = new Workbook("-");
	$worksheet1 =& $workbook->add_worksheet($i_judul);
	$worksheet1->write_string(0,0,"NO.");
	$worksheet1->write_string(0,1,"KODE");
	$worksheet1->write_string(0,2,"NAMA");
	$worksheet1->write_string(0,3,"ALAMAT");
	$worksheet1->write_string(0,4,"TELP");
	$worksheet1->write_string(0,5,"WA");
	$worksheet1->write_string(0,6,"KOORDINAT");

	
	//data
	$qdt = mysqli_query($koneksi, "SELECT * FROM m_user ".
										"ORDER BY nama ASC");
	$rdt = mysqli_fetch_assoc($qdt);

	do
		{
		//nilai
		$dt_nox = $dt_nox + 1;
		$i_kode = balikin($rdt['kode']);
		$i_nama = balikin($rdt['nama']);
		$i_alamat = balikin($rdt['alamat']);
		$i_telp = balikin($rdt['telp']);
		$i_wa = balikin($rdt['wa']);
		$i_koordinat = balikin($rdt['koordinat']);



		//ciptakan
		$worksheet1->write_string($dt_nox,0,$dt_nox);
		$worksheet1->write_string($dt_nox,1,$i_kode);
		$worksheet1->write_string($dt_nox,2,$i_nama);
		$worksheet1->write_string($dt_nox,3,$i_alamat);
		$worksheet1->write_string($dt_nox,4,$i_telp);
		$worksheet1->write_string($dt_nox,5,$i_wa);
		$worksheet1->write_string($dt_nox,6,$i_koordinat);
		}
	while ($rdt = mysqli_fetch_assoc($qdt));


	//close
	$workbook->close();

	
	
	//re-direct
	xloc($filenya);
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




//nek entri baru
if ($_POST['btnBARU'])
	{
	//re-direct
	$ke = "$filenya?s=baru&kd=$x";
	xloc($ke);
	exit();
	}







//jika simpan
if ($_POST['btnSMP'])
	{
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$page = nosql($_POST['page']);
	$e_kode = cegah($_POST['e_kode']);
	$e_nama = cegah($_POST['e_nama']);
	$e_alamat = cegah($_POST['e_alamat']);
	$e_telp = cegah($_POST['e_telp']);
	$e_wa = cegah($_POST['e_wa']);
	$e_koordinat = cegah($_POST['e_koordinat']);


	$namabaru = "$kd-1.jpg";



	//nek null
	if ((empty($e_nama)) OR (empty($e_kode)))
		{
		//re-direct
		$pesan = "Belum Ditulis. Harap Diulangi...!!";
		$ke = "$filenya?s=$s&kd=$kd";
		pekem($pesan,$ke);
		exit();
		}
	else
		{
		//jika update
		if ($s == "edit")
			{
			mysqli_query($koneksi, "UPDATE m_user SET kode = '$e_kode', ".
										"nama = '$e_nama', ".
										"alamat = '$e_alamat', ".
										"telp = '$e_telp', ".
										"wa = '$e_wa', ".
										"koordinat = '$e_koordinat', ".
										"postdate = '$today' ".
										"WHERE kd = '$kd'");

			//re-direct
			xloc($filenya);
			exit();
			}



		//jika baru
		if ($s == "baru")
			{
			//cek
			$qcc = mysqli_query($koneksi, "SELECT kode FROM m_user ".
												"WHERE kode = '$e_kode'");
			$rcc = mysqli_fetch_assoc($qcc);
			$tcc = mysqli_num_rows($qcc);

			//nek ada
			if ($tcc != 0)
				{
				//re-direct
				$pesan = "Sudah Ada. Silahkan Ganti Yang Lain...!!";
				$ke = "$filenya?s=baru&kd=$kd";
				pekem($pesan,$ke);
				exit();
				}
			else
				{
				//insert
				mysqli_query($koneksi, "INSERT INTO m_user(kd, kode, nama, ".
										"alamat, telp, wa, koordinat, postdate) VALUES ".
										"('$kd', '$e_kode', '$e_nama', ".
										"'$e_alamat', '$e_telp', '$e_wa', '$e_koordinat', '$today')");


				//re-direct
				xloc($filenya);
				exit();
				}
			}
		}
	}




//jika hapus
if ($_POST['btnHPS'])
	{
	//ambil nilai
	$jml = nosql($_POST['jml']);
	$page = nosql($_POST['page']);
	$ke = "$filenya?page=$page";

	//ambil semua
	for ($i=1; $i<=$jml;$i++)
		{
		//ambil nilai
		$yuk = "item";
		$yuhu = "$yuk$i";
		$kd = nosql($_POST["$yuhu"]);

		//del
		mysqli_query($koneksi, "DELETE FROM m_user ".
						"WHERE kd = '$kd'");
		}

	//auto-kembali
	xloc($filenya);
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
//jika edit / baru
if (($s == "baru") OR ($s == "edit"))
	{
	$kdx = nosql($_REQUEST['kd']);

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


	
	
	<div class="row">

	<div class="col-md-6">
		
	<?php
	echo '<form action="'.$filenya.'" method="post" name="formx2">
	
	
	<p>
	KODE : 
	<br>
	<input name="e_kode" type="text" value="'.$e_kode.'" size="10" class="btn-warning">
	</p>


	<p>
	NAMA : 
	<br>
	<input name="e_nama" type="text" value="'.$e_nama.'" size="30" class="btn-warning">
	</p>

	<p>
	ALAMAT : 
	<br>
	<input name="e_alamat" type="text" value="'.$e_alamat.'" size="50" class="btn-warning">
	</p>

	<p>
	KOORDINAT : 
	<br>
	<input name="e_koordinat" type="text" value="'.$e_koordinat.'" size="20" class="btn-warning">
	</p>
	

	<p>
	TELEPON : 
	<br>
	<input name="e_telp" type="text" value="'.$e_telp.'" size="20" class="btn-warning">
	</p>
	
	
	<p>
	WA : 
	<br>
	<input name="e_wa" type="text" value="'.$e_wa.'" size="20" class="btn-warning">
	</p>

	



	<p>
	<input name="jml" type="hidden" value="'.$count.'">
	<input name="s" type="hidden" value="'.$s.'">
	<input name="kd" type="hidden" value="'.$kdx.'">
	<input name="page" type="hidden" value="'.$page.'">
	
	<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
	<input name="btnBTL" type="submit" value="BATAL" class="btn btn-info">
	</p>
	
	
	</form>';
	
	?>
		
	
	
	</div>
	
	<div class="col-md-6">
	

	
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  


	<style type="text/css">
	.thumb-image{
	 float:left;
	 width:150px;
	 height:150px;
	 position:relative;
	 padding:5px;
	}
	</style>
	
	
	
	
		<table border="0" cellspacing="0" cellpadding="3">
		<tr valign="top">
		<td width="100">
			<div id="image-holder"></div>
		</td>
		

		</tr>
		</table>
	
	<script>
	$(document).ready(function() {
		
		
	        $("#image_upload").on('change', function() {
	          //Get count of selected files
	          var countFiles = $(this)[0].files.length;
	          var imgPath = $(this)[0].value;
	          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
	          var image_holder = $("#image-holder");
	          image_holder.empty();
	          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
	            if (typeof(FileReader) != "undefined") {
	              //loop for each file selected for uploaded.
	              for (var i = 0; i < countFiles; i++) 
	              {
	                var reader = new FileReader();
	                reader.onload = function(e) {
	                  $("<img />", {
	                    "src": e.target.result,
	                    "class": "thumb-image"
	                  }).appendTo(image_holder);
	                }
	                image_holder.show();
	                reader.readAsDataURL($(this)[0].files[i]);
	              }
	              
	
		    
	            } else {
	              alert("This browser does not support FileReader.");
	            }
	          } else {
	            alert("Pls select only images");
	          }
	        });
	        
	        


	        
	        
	        
	      });
	</script>

	<?php
	echo '<div id="loading" style="display:none">
	<img src="'.$sumber.'/template/img/progress-bar.gif" width="100" height="16">
	</div>
	
	
   <form method="post" id="upload_image" enctype="multipart/form-data">
	<input type="file" name="image_upload" id="image_upload" class="btn btn-warning" />

   </form>
   
   <hr>';
	
	?>
	
	
	<script>  
	$(document).ready(function(){
		
		
		
	       $('#image-holder').load("<?php echo $sumber;?>/adm/m/i_user.php?aksi=lihat1&kd=<?php echo $kd;?>");

	
	
	        
	    $('#upload_image').on('change', function(event){
	     event.preventDefault();
	     
			$('#loading').show();
	
	
		
		     $.ajax({
		      url:"i_user_upload.php?kd=<?php echo $kd;?>",
		      method:"POST",
		      data:new FormData(this),
		      contentType:false,
		      cache:false,
		      processData:false,
		      success:function(data){
				$('#loading').hide();
		       $('#preview').load("<?php echo $sumber;?>/adm/m/i_user.php?aksi=lihat&kd=<?php echo $kd;?>");
		       	
		      }
		     })
		    });
		    
		    
	});  
	</script>




	</div>
	
	</div>


	<?php
	}
	









//jika import
else if ($s == "import")
	{
	?>
	<div class="row">

	<div class="col-md-12">
		
	<?php
	echo '<form action="'.$filenya.'" method="post" enctype="multipart/form-data" name="formxx2">
	<p>
		<input name="filex_xls" type="file" size="30" class="btn btn-warning">
	</p>

	<p>
		<input name="btnBTL" type="submit" value="BATAL" class="btn btn-info">
		<input name="btnIMX" type="submit" value="IMPORT >>" class="btn btn-danger">
	</p>
	
	
	</form>';	
	?>
		


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
	
	
	
	echo '<form action="'.$filenya.'" method="post" name="formxx">
	<p>
	<input name="btnBARU" type="submit" value="ENTRI BARU" class="btn btn-danger">
	<input name="btnIM" type="submit" value="IMPORT" class="btn btn-primary">
	<input name="btnEX" type="submit" value="EXPORT" class="btn btn-success">
	</p>
	<br>
	
	</form>



	<form action="'.$filenya.'" method="post" name="formx">
	<p>
	<input name="kunci" type="text" value="'.$kunci2.'" size="20" class="btn btn-warning" placeholder="Kata Kunci...">
	<input name="btnCARI" type="submit" value="CARI" class="btn btn-danger">
	<input name="btnBTL" type="submit" value="RESET" class="btn btn-info">
	</p>
		
	
	<div class="table-responsive">          
	<table class="table" border="1">
	<thead>
	
	<tr valign="top" bgcolor="'.$warnaheader.'">
	<td width="20">&nbsp;</td>
	<td width="20">&nbsp;</td>
	<td width="50"><strong><font color="'.$warnatext.'">FOTO</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">KODE</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">NAMA</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">ALAMAT</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">TELP</font></strong></td>
	<td align="center"><strong><font color="'.$warnatext.'">WA</font></strong></td>
	<td width="50"><strong><font color="'.$warnatext.'">POSTDATE</font></strong></td>
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
			<input type="checkbox" name="item'.$nomer.'" value="'.$i_kd.'">
	        </td>
			<td>
			<a href="'.$filenya.'?s=edit&page='.$page.'&kd='.$i_kd.'"><img src="'.$sumber.'/template/img/edit.gif" width="16" height="16" border="0"></a>
			</td>
			<td>
			
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
			<td>'.$i_postdate.'</td>
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
	
	<input name="btnALL" type="button" value="SEMUA" onClick="checkAll('.$count.')" class="btn btn-primary">
	<input name="btnBTL" type="reset" value="BATAL" class="btn btn-warning">
	<input name="btnHPS" type="submit" value="HAPUS" class="btn btn-danger">
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