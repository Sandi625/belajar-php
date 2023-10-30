<?php
require 'function.php';

// Periksa apakah pengguna sudah login, jika ya, alihkan ke halaman utama
if(!empty($_SESSION["id"])){
  header("Location: index.php");
  exit(); // Pastikan untuk keluar dari skrip setelah mengalihkan pengguna
}

$login = new Login();

if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  
  // Melakukan pemeriksaan login
  $result = $login->login($usernameemail, $password);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: index.php");
    exit(); // Pastikan untuk keluar dari skrip setelah mengalihkan pengguna
  }
  elseif($result == 10){
    echo "<script> alert('Password Salah'); </script>";
  }
  elseif($result == 100){
    echo "<script> alert('User Belum Registrasi'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>

      <form action="" method="post" autocomplete="off">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username or Email" name="usernameemail" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Masuk</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="#">Lupa sandi?</a>
      </p>
      <p class="mb-0">
        <a href="registration.php" class="text-center">Klik Untuk Register</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="app/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="app/dist/js/adminlte.min.js"></script>
</body>
</html>

