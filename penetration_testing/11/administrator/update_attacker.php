<?php
session_start();

// apakah session 'xyb_injection' sudah ada?
if (!isset($_SESSION['xyb_injection'])
   || $_SESSION['xyb_injection'] !== true) {

   // jika blm ada berarti user tersebut blm login, so, di redirect ke halaman login.
   header('Location: index.php');
   exit;
}
$tanggal = date("Ymd");
$pre     = $_POST[attacker];
include "../library/config.php";
include "../library/opendb.php";
mysql_query("insert into table_attacker (nama,tanggal)
                  values ('$pre','$tanggal')") or die ('Mr.SQL Said'.mysql_error());
include "../library/closedb.php";
header('Location: ' . $_SERVER['REQUEST_URI']);
header('location: ../list_attacker.php');				  

?>