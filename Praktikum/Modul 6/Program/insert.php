<?php

include "koneksi.php";

$sql = "INSERT INTO mahasiswa (nim, nama, alamat, jenis_kelamin)
VALUES('1302020002', 'Ahmad Ruslandia', 'FIKOM','pria')";

$query = $connection->query($sql);

if($query){
    echo "Data Berhasil Ditambahkan";
}else{
    echo "Data Gagal Ditambahkan";
}

?>