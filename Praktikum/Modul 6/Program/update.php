<?php

include "koneksi.php";

$sql = "UPDATE mahasiswa SET nama = 'Farhan' WHERE nim = '1302020001'";

$query = $connection->query($sql);

if($query){
    echo "Data Berhasil Ubah";
}else{
    echo "Data Gagal Diubah";
}

?>