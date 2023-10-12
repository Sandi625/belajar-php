<?php 
session_start();
unset($_SESSION['id_pengguna']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_lengkap']);
session_destroy();

header("Location: ../index.php");
exit();


?>