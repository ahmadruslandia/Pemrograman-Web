<?php

$host = "localhost";
$username = "root";
$pass = "";
$database = "modul6_002";

$connection = new mysqli($host, $username, $pass, $database);

if($connection->connect_errno > 0){
    echo "Koneksi PHP dan Mysql Gagal";
}else{
    echo "Koneksi PHP dan Mysql Berhasil". "<br><br>";
}

?>