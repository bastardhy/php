<?php
$host ="localhost";
$username ="pekoq";
$password ="lokalisasi";
$database ="python";
 
$conn_string = "host=$host port=5432 dbname=$database user=$username password=$password";
$koneksi = pg_connect($conn_string);
 
if($koneksi){
    echo ("koneksi sukses");
}
else{
    echo ("koneksi gagal");
}
?>