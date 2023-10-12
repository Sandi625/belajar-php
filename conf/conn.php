<?php
$hostname ="localhost";
$username = "root";
$password = "";
$database = "toko_online";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn)
{
   die("koneksi gagal: " . mysqli_connect_error());

}
echo "koneksi berhasil";
mysqli_close($conn)
?>