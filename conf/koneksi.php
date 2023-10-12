<?php
$server ="localhost";
$username = "root";
$password = "";
$nama_db = "appku";

$koneksi = mysqli_connect($server, $username, $password, $nama_db);

if(!$koneksi)
{
    echo "Tidak terkonek ke database";

}else{
    echo "koneksi berhasil";
}

?>