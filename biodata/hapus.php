<?php
include 'connect.php';
if (isset($_GET['id'])) {
    $dbh->exec("DELETE FROM tabel_biodata WHERE id = '$_GET[id]'");
}
header("location:index.php")
?>