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
$tpl = LoadTpl("../../template/adm.html");

nocache;

//nilai
$filenya = "profil.php";
$judul = "[SETTING] Profil";
$judulku = "[SETTING] Profil";
$juduli = $judul;











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




//jika simpan
if ($_POST['btnSMP'])
	{
	$s = nosql($_POST['s']);
	$kd = nosql($_POST['kd']);
	$page = nosql($_POST['page']);
	$e_nama = cegah($_POST['e_nama']);
	$e_alamat = cegah($_POST['e_alamat']);
	$e_telp = cegah($_POST['e_telp']);
	$e_wa = cegah($_POST['e_wa']);
	$e_email = cegah($_POST['e_email']);
	$e_norek = cegah($_POST['e_norek']);
	$e_npwp = cegah($_POST['e_npwp']);


	//update
	mysqli_query($koneksi, "UPDATE m_profil SET nama = '$e_nama', ".
								"alamat = '$e_alamat', ".
								"telp = '$e_telp', ".
								"wa = '$e_wa', ".
								"email = '$e_email', ".
								"npwp = '$e_npwp', ".
								"norek = '$e_norek', ".
								"postdate = '$today'");

	//re-direct
	xloc($ke);
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
$qx = mysqli_query($koneksi, "SELECT * FROM m_profil");
$rowx = mysqli_fetch_assoc($qx);
$e_nama = balikin($rowx['nama']);
$e_alamat = balikin($rowx['alamat']);
$e_telp = balikin($rowx['telp']);
$e_email = balikin($rowx['email']);
$e_npwp = balikin($rowx['npwp']);
$e_norek = balikin($rowx['norek']);
$e_wa = balikin($rowx['wa']);


echo '<form action="'.$filenya.'" method="post" name="formx2">
		
<div class="row">
	<div class="col-md-4">
		<p>
		Nama : 
		<br>
		<input name="e_nama" type="text" size="30" value="'.$e_nama.'" class="btn btn-warning" required>
		</p>
		
		<p>
		Alamat : 
		<br>
		<input name="e_alamat" type="text" size="30" value="'.$e_alamat.'" class="btn btn-block btn-warning" required>
		</p>
		
		<p>
		Telepon : 
		<br>
		<input name="e_telp" type="text" size="20" value="'.$e_telp.'" class="btn btn-warning" required>
		</p>
		
		
		<p>
		WA : 
		<br>
		<input name="e_wa" type="text" size="20" value="'.$e_wa.'" class="btn btn-warning" required>
		</p>
		
	</div>
		
		
	<div class="col-md-4">
	
		<p>
		E-Mail : 
		<br>
		<input name="e_email" type="text" size="25" value="'.$e_email.'" class="btn btn-block btn-warning" required>
		</p>
		
		<p>
		NPWP : 
		<br>
		<input name="e_npwp" type="text" size="30" value="'.$e_npwp.'" class="btn btn-warning" required>
		</p>
		
		<p>
		NoRek BANK : 
		<br>
		<input name="e_norek" type="text" size="30" value="'.$e_norek.'" class="btn btn-warning" required>
		</p>
		
		
	</div>
	
</div>




<hr>		
<p>
<input name="btnSMP" type="submit" value="SIMPAN" class="btn btn-danger">
<input name="btnBTL" type="submit" value="BATAL" class="btn btn-info">
</p>

</form>


<br><br><br>';

//isi
$isi = ob_get_contents();
ob_end_clean();

require("../../inc/niltpl.php");



//null-kan
xfree($qbw);
xclose($koneksi);
exit();
?>