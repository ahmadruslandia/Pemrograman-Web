<?php

include "koneksi.php";

$sql = "SELECT *FROM mahasiswa";

$query = $connection->query($sql);

if($query){
    while($row = $query->fetch_object()){
        echo "NIM : " . $row->nim . "<br>";
        echo "Nama : " . $row->nama . "<br>";
        echo "Alamat : " . $row->alamat . "<br>";
        echo "Jenis Kelamin : " . $row->jenis_kelamin . "<br>";

    }
}else{
    echo "Query Gagal";
}

?>