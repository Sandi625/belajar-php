<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $nama_lengkap = $_POST["nama_lengkap"];
    $username = $_POST["username"];
    $password_1 = $_POST["password_1"];
    $password_2 = $_POST["password_2"];
    // Periksa apakah password yang dimasukkan sama
    if ($password_1 == $password_2) {
        // Query untuk menyimpan data ke database (gantilah nama tabel dan kolom sesuai dengan struktur tabel Anda)
        $sql = "INSERT INTO tbl_pengguna (nama_lengkap, username, password) VALUES ('$nama_lengkap', '$username', '$password_1')";

        if ($koneksi->query($sql) === TRUE) {
            echo "Registrasi berhasil. Silakan login <a href='../index.php'>di sini</a>.";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    } else {
        echo "Password tidak cocok. Silakan coba lagi.";
    }
}

$koneksi->close();
?>
