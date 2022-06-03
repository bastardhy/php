<?php
include 'connect.php';

if (isset($_POST)) {
    $sql = "INSERT INTO tabel_biodata VALUES ('', '$_POST[nama]', '$_POST[jenis_kelamin]', '$_POST[alamat]', '$_POST[no_hp]')";
    $dbh->exec($sql);
}

header("location:index.php");
?>
