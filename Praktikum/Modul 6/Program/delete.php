<?php

include "koneksi.php";

$sql = "DELETE FROM mahasiswa WHERE nim = '1302020002'";

$query = $connection->query($sql);

if($query){
    echo "Data Berhasil Dihapus";
}else{
    echo "Data Gagal Dihapus";
}

?>