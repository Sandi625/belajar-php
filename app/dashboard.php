<?php
// Data produk (isi, harga, deskripsi, dll) ditampung di variabel php.
$nama = array('produk1', 'produk2', 'produk3', 'produk4', 'produk5',);
$deskripsi = array('deskripsi produk1', 'deskripsi produk2', 'deskripsi produk3', 'deskripsi produk4', 'deskripsi produk5');
$harga = array('$10', '$15', '$20', '$25', '$30');
$gambar = array();

//membaca folder img yang berisi gambar
$folder = 'img/';

// Mengambil daftar file dalam folder menggunakan scandir
$daftarFile = scandir($folder);

// Menghilangkan . dan .. dari daftar file
$daftarFile = array_diff($daftarFile, array('.', '..'));

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->

    <!-- Messages Dropdown Menu -->


    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <!-- <div class="sidebar">
     Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Sandi Permadi</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="index3.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Halaman dashboad Original
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Halaman Login
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>

          <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard Listing new product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">

 
  <div class="container mt-5">
    <h1>Listing Produk</h1>
    <div class="row">
        <!-- Menampilkan gambar-gambar dari daftar file -->
        <?php foreach ($daftarFile as $index => $gambar) { ?>
            <?php
            // pemanggilan gambar dari folder img menggunakan regex bahwa gambar harus di mulai dengan huruf p dan angka dan mencari semua isi dengan d+ dengan format gambar .jpg
            if (preg_match('/^p\d+\.jpg$/', $gambar)) {
                // Mendapatkan indeks dari file gambar (misalnya, "p1.jpg" akan mendapatkan indeks 1)
                $indeksProduk = intval(substr($gambar, 1, -4)) - 1;

                // Periksa apakah indeks valid dalam array $nama, $deskripsi, dan $harga
                if (isset($nama[$indeksProduk]) && isset($deskripsi[$indeksProduk]) && isset($harga[$indeksProduk])) {
            ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img src="<?php echo $folder . $gambar; ?>" class="card-img-top" alt="Produk">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $nama[$indeksProduk]; ?></h5>
                                <p class="card-text"><?php echo $deskripsi[$indeksProduk]; ?></p>
                                <p class="card-text"><?php echo $harga[$indeksProduk]; ?></p>
                                <a href="#" class="btn btn-primary">Beli</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        <?php } ?>
    </div>
</div>




      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <!-- <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer> -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>