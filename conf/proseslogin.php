<?php 
include "koneksi.php";
session_start();
// Mengambil data dari form menggunakan name=''
$username = $_POST['username'];
$password = $_POST['password'];
$query = "select * from tbl_pengguna where username= '".$username."'and password= '".$password."'";
$data = mysqli_query($koneksi, $query);
$cek = mysqli_num_rows($data);
if($cek > 0) {
    $baris = mysqli_fetch_array($data);
    $_SESSION['id_pengguna'] = $baris['id_pengguna'];
    $_SESSION['username'] = $baris['username'];
    $_SESSION['password'] = $baris['password'];
    $_SESSION['nama_lengkap'] = $baris['nama_lengkap'];
    header("Location:../app/dasbor.php");
} else {
    // Jika login gagal, beri pesan kesalahan
    $pesan = "Username atau password salah. Silakan coba lagi.";
    // Menggunakan session untuk menyimpan pesan kesalahan
    $_SESSION['pesan'] = $pesan;
    header("Location:../index.php");
}
?>
