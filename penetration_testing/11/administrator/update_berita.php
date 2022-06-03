<?php
session_start();

// apakah session 'xyb_injection' sudah ada?
if (!isset($_SESSION['xyb_injection'])
        || $_SESSION['xyb_injection'] !== true) {

   // jika blm ada berarti user tersebut blm login, so, di redirect ke halaman login.
   header('Location: index.php');
   exit;
}

include "../library/config.php";
include "../library/opendb.php";

mysql_query("update table_berita set id ='$_POST[id]',
                              judul ='$_POST[txtjudul]',
						     berita ='$_POST[txtberita]',
						    tanggal ='$_post[tanggal]'
						where    id ='$_POST[id]'");
						


include "../library/closedb.php";
header ('location:admin.php');
?>