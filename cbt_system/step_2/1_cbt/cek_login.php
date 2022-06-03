<?php
include "config/koneksi.php";
$username = $_POST['username'];
$pass     = md5($_POST['password']);
$query  = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
$login  = mysqli_query($konek, $query);
$ketemu = mysqli_num_rows($login);
$r=mysqli_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[namauser]     = $r[username];
  $_SESSION[namalengkap]  = $r[nama_lengkap];
  $_SESSION[jabatan]     = $r[jabatan];
  $_SESSION[kategori]     = $r[id_user];
  $_SESSION[passuser]     = $r[password];
  $_SESSION[leveluser]    = $r[level];
   header('location:media.php?module=home');
}
else{
  include "error-login.php";
}
?>
