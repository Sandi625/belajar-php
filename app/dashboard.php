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

  <!-- /.content-header -->
  <?php include('navbarsidebar.php'); ?>
  <!-- Main content -->
  <section class="content">


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
    <div class="container mt-5">
      <h1>Listing Produk</h1>
      <div class="row">
        <!-- Menampilkan gambar-gambar dari daftar file -->
        <?php
        $folder = 'img/';
        $gambarFiles = glob($folder . 'p*.jpg');

        $totalGambar = count($gambarFiles);
        // Menggunakan loop for untuk menghitung jumlah elemen dalam array gambar dan menyimpan hasilnya dalam variabel totalGambar
        for ($i = 0; $i < $totalGambar; $i++) {
          $gambar = $gambarFiles[$i];
          //  menggunakan ekspresi reguler (regex) untuk memeriksa apakah nama file gambar dimulai dengan huruf "p" diikuti oleh satu atau lebih digit, dan diakhiri dengan ".jpg"
          if (preg_match('/^p\d+\.jpg$/', basename($gambar))) {
            // Mendapatkan indeks dari file gambar (misalnya, "p1.jpg" akan mendapatkan indeks 1)
            $indeksProduk = intval(substr(basename($gambar), 1, -4)) - 1;
            // Memeriksa apakah indeks valid dalam array $nama, $deskripsi, dan $harga
            if (isset($nama[$indeksProduk]) && isset($deskripsi[$indeksProduk]) && isset($harga[$indeksProduk])) { ?>
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                  <img src="<?php echo $gambar; ?>" class="card-img-top" alt="Produk">
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
        }
        ?>




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