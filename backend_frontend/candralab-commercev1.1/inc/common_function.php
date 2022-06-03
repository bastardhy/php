<?php

function query($qry) {
	$result = mysql_query($qry) or die("Gagal melakukan query pada :
	 <br>$qry<br><br>Kode Salah : <br>&nbsp;&nbsp;&nbsp;" . mysql_error() . "!");
	return $result;
}

function fetch_row($qry) {
	$tmp = query($qry);
	list($result) = mysql_fetch_row($tmp);
	return $result;
}

function num_rows($qry) {
	$tmp = query($qry);
	$jum = mysql_num_rows($tmp);
	return $jum;
}

function valid($tmp) {
	return htmlentities(addslashes($tmp));
}

function user_member($user) {
	$br = fetch_row("SELECT user FROM member WHERE user='$user'");
	if ($br != '')
		return true;
	else
		return false;
}

function pass_member($user, $pass) {
	$br = fetch_row("SELECT user FROM member WHERE user='$user' AND pass=md5('$pass')");
	if ($br != '')
		return true;
	else
		return false;
}

function cek_email($email, $check_domain = false) {
	if ($check_domain) {
	}
	if (ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+' . '@' . '[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.' . '[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $email)) {
		if ($check_domain && function_exists('checkdnsrr')) {
			list(, $domain) = explode('@', $email);
			if (checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A')) {
				return true;
			}
			return false;
		}
		return true;
	}
	return false;
}

function no_baris($j = "") {
	if ($j == "")
		$jum = 15;
	else
		$jum = $j;
	if (isset($_GET["entrant"]) && ($_GET["entrant"] > 1))
		return $jum * ($_GET["entrant"] - 1);
	else
		return 0;
}

function paging($sql, $limit) {
	require_once (class_ . 'pager/Pager.php');
	$isi = query($sql);
	$data = array();
	while ($row = mysql_fetch_row($isi)) {
		$data[] = $row;
	}
	@mysql_free_result($isi);
	$params = array('itemData' => $data, 'perPage' => $limit, 'delta' => 5, 'append' => true, 'separator' => '', 'clearIfVoid' => false, 'urlVar' => 'entrant', 'useSessions' => false, 'closeSession' => false, 'mode' => 'Jumping', );

	$pager = &Pager::factory($params);
	return $pager;
}

function warning_delete() {
	return "onclick=\"return confirm('Yakin data akan dihapus.?')\"";
}

function warning_update() {
	return "onclick=\"return confirm('Yakin data akan diubah.?')\"";
}

function warning_cancel() {
	return "onclick=\"return confirm('Yakin pemesanan akan dibatalkan.?')\"";
}

function pesan_error($s = '') {
	echo "<script type=\"text/javascript\">alert(\"Maaf, $s..!!\");window.history.back();</script>";
}

function pesan_comment($url = '') {
	if ($url === '')
		$url = './';
	echo "<script type=\"text/javascript\">alert(\"Terima kasih telah mengisi komentar di sistem ini..!!\");</script>";
	echo "<META HTTP-EQUIV = 'Refresh' Content = '0; URL = $url'>";
}

function pesan_submit($url = '') {
	if ($url === '')
		$url = './';
	echo "<script type=\"text/javascript\">alert(\"Data Berhasil Disimpan..!!\");</script>";
	echo "<META HTTP-EQUIV = 'Refresh' Content = '0; URL = $url'>";
}

function konversi_bulan($bln) {
	switch($bln) {
		case "01" :
			$bulan = "Januari";
			break;
		case "02" :
			$bulan = "Februari";
			break;
		case "03" :
			$bulan = "Maret";
			break;
		case "04" :
			$bulan = "April";
			break;
		case "05" :
			$bulan = "Mei";
			break;
		case "06" :
			$bulan = "Juni";
			break;
		case "07" :
			$bulan = "Juli";
			break;
		case "08" :
			$bulan = "Agustus";
			break;
		case "09" :
			$bulan = "September";
			break;
		case "10" :
			$bulan = "Oktober";
			break;
		case "11" :
			$bulan = "November";
			break;
		case "12" :
			$bulan = "Desember";
			break;
		default :
			$bulan = "Error!, Kode bulan diluar range";
	}
	return $bulan;
}

function konversi_tanggal($time) {
	list($thn, $bln, $tgl) = explode('-', $time);
	$tmp = $tgl . " " . konversi_bulan($bln) . " " . $thn;
	return $tmp;
}

function tampil_tanggal($time) {
	list($date, $time) = explode(' ', $time);
	$tmp = konversi_tanggal($date) . " " . $time;
	return $tmp;
}

function selected($t1, $t2) {
	if (trim($t1) == trim($t2))
		return "selected";
	else
		return "";
}

function combo_kategori($kode) {
	echo "<option value='' selected>- Pilih Kategori-</option>";
	$query = query("SELECT kd_kategori, nama_kategori FROM kategori ORDER BY nama_kategori ASC");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function combo_penerbit($kode) {
	echo "<option value='' selected>- Pilih Penerbit-</option>";
	$query = query("SELECT kd_penerbit, nama FROM penerbit ORDER BY nama ASC");
	while ($row = mysql_fetch_row($query)) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}
function combo_sex($sex) {
	echo "<option value='' selected>- Jenis Kelamin -</option>";
	if ($sex == "") {
		echo "<option value='Pria'> Pria </option>";
		echo "<option value='Wanita'> Wanita </option>";
	} else {
		echo "<option value='Pria'" . selected('Pria', $sex) . "> Pria </option>";
		echo "<option value='Wanita'" . selected('Wanita', $sex) . "> Wanita </option>";
	}
}

function get_date($tgl = '') {
	if ($tgl == "")
		$now = date("d");
	else
		$now = $tgl;
	$jum_hr = date("t");
	for ($i = 1; $i <= $jum_hr; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">$i</option>";
	}
}

function get_month($bln = '') {
	if ($bln == "")
		$now = date("m");
	else
		$now = $bln;
	$jum_bl = 12;
	for ($i = 1; $i <= $jum_bl; $i++) {
		echo "<option value='$i' " . selected($i, $now) . ">" . konversi_bulan($i) . "</option>";
	}
}

function get_year($thn = '') {
	if ($thn == "") {
		$now = date("Y");
		$thn = date("Y");
	} else {
		$now = date("Y");
		$thn = $thn;
	}
	$jum_th = 3;
	for ($i = 1; $i <= $jum_th; $i++) {
		echo "<option value='$now' " . selected($thn, $now) . ">" . $now . "</option>";
		$now--;
	}
}

function kode_pesan() {
	$kode_temp = fetch_row("SELECT kd_pesan FROM pesan ORDER BY kd_pesan DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "P001";
	else {
		$jum = substr($kode_temp, 1, 6);
		$jum++;
		if ($jum <= 9)
			$kode = "P00" . $jum;
		elseif ($jum <= 99)
			$kode = "P0" . $jum;
		elseif ($jum <= 999)
			$kode = "P" . $jum;
	
		else
			die("Kode pemesanan melebihi batas");
	}
	return $kode;
}
function kode_customer() {
	$kode_temp = fetch_row("SELECT kd_pemesan FROM customer ORDER BY kd_pemesan DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "C001";
	else {
		$jum = substr($kode_temp, 1, 6);
		$jum++;
		if ($jum <= 9)
			$kode = "C00" . $jum;
		elseif ($jum <= 99)
			$kode = "C0" . $jum;
		elseif ($jum <= 999)
			$kode = "C" . $jum;
	
		else
			die("Kode pemesanan melebihi batas");
	}
	return $kode;
}
function kode_buku() {
	$kode_temp = fetch_row("SELECT kd_buku FROM buku ORDER BY kd_buku DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "B0001";
	else {
		$jum = substr($kode_temp, 1, 4);
		$jum++;
		if ($jum <= 9)
			$kode = "B000" . $jum;
		elseif ($jum <= 99)
			$kode = "B00" . $jum;
		elseif ($jum <= 999)
			$kode = "B0" . $jum;
		elseif ($jum <= 9999)
			$kode = "B" . $jum;
	
		else
			die("Kode buku melebihi batas");
	}
	return $kode;
}
function kode_kategori() {
	$kode_temp = fetch_row("SELECT kd_kategori FROM kategori ORDER BY kd_kategori DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "K01";
	else {
		$jum = substr($kode_temp, 1, 2);
		$jum++;
		if ($jum <= 9)
			$kode = "K0" . $jum;
		elseif ($jum <= 99)
			$kode = "K" . $jum;
	
		else
			die("Kode Kategori melebihi batas");
	}
	return $kode;
}
function kode_penerbit() {
	$kode_temp = fetch_row("SELECT kd_penerbit FROM penerbit ORDER BY kd_penerbit DESC LIMIT 0,1");
	if ($kode_temp == '')
		$kode = "P01";
	else {
		$jum = substr($kode_temp, 1, 2);
		$jum++;
		if ($jum <= 9)
			$kode = "P0" . $jum;
		elseif ($jum <= 99)
			$kode = "P" . $jum;
	
		else
			die("Kode Penerbit melebihi batas");
	}
	return $kode;
}

function format_uang($duit, $space = false) {
	$rp = ($space) ? "Rp. " : "Rp.";
	return $rp . number_format($duit, 0, ",", ".") . ",- ";
}

function huruf($x) {
	$x = abs($x);
	$angka = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($x < 12)
		$temp = " " . $angka[$x];
	else if ($x < 20)
		$temp = huruf($x - 10) . " belas";
	else if ($x < 100)
		$temp = huruf($x / 10) . " puluh" . huruf($x % 10);
	else if ($x < 200)
		$temp = " seratus" . huruf($x - 100);
	else if ($x < 1000)
		$temp = huruf($x / 100) . " ratus" . huruf($x % 100);
	else if ($x < 2000)
		$temp = " seribu" . huruf($x - 1000);
	else if ($x < 1000000)
		$temp = huruf($x / 1000) . " ribu" . huruf($x % 1000);
	else if ($x < 1000000000)
		$temp = huruf($x / 1000000) . " juta" . huruf($x % 1000000);
	else if ($x < 1000000000000)
		$temp = huruf($x / 1000000000) . " milyar" . huruf(fmod($x, 1000000000));
	else if ($x < 1000000000000000)
		$temp = huruf($x / 1000000000000) . " trilyun" . huruf(fmod($x, 1000000000000));
	else
		$temp = "wedew";
	return $temp;
}

function terbilang($x, $style = 4) {
	if ($x < 0) {
		$hasil = "minus " . trim(huruf($x)) . " rupiah";
	} else {
		$hasil = trim(huruf($x)) . " rupiah";
	}
	switch ($style) {
		case 1 :
			$hasil = strtoupper($hasil);
			break;
		case 2 :
			$hasil = strtolower($hasil);
			break;
		case 3 :
			$hasil = ucwords($hasil);
			break;
		default :
			$hasil = ucfirst($hasil);
			break;
	}
	return $hasil;
}

function cek_bayar() {
	$id_member = fetch_row("SELECT id_member FROM member WHERE user='" . $_SESSION['VIRTUALDOCTER_MEMBER'] . "'");
	$temp = fetch_row("SELECT status_pesan FROM pesan WHERE status_pesan='0' AND id_member='$id_member'");
	if ($temp == '')
		return true;
	else
		return false;
}

function cek_status_bayar($kode) {
	$br = fetch_row("SELECT status_pesan FROM pesan WHERE id_pesan='$kode'");
	if ($br == '1')
		return true;
	else
		return false;
}
?>
