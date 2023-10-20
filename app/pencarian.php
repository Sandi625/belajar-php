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
  <link rel="stylesheet" href="dist/css/table.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <!-- /.content-header -->
  <?php include('navbarsidebar.php'); ?>
  <!-- Main content -->
  <section class="content">

  <form method="post" action="">
        <label for="keyword">Cari Nama:</label>
        <input type="text" id="keyword" name="keyword">
        <input type="submit" value="Cari">
    </form>






  </section>
  <?php
include '../conf/con_tbproduk.php';

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan kata kunci pencarian
    $keyword = $_POST["keyword"];

    // Query untuk mencari nama berdasarkan kata kunci
    $sql = "SELECT * FROM products WHERE product_name LIKE 
    '%$keyword%' OR category_id LIKE '%$keyword%' OR product_code LIKE 
    '%$keyword%' OR description LIKE '%$keyword%'";
    $result = $koneksi->query($sql);

    // Menampilkan hasil pencarian dalam tabel
    echo "<h2>Hasil Pencarian untuk '$keyword':</h2>";
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Nama Produk</th>
                    <th>Kategori ID</th>
                    <th>Kode Produk</th>
                    <th>Status Aktif</th>
                    <th>Dibuat pada</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Unit</th>
                    <th>Jumlah Diskon</th>
                    <th>Stok</th>
                    <th>Image</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["product_name"] . "</td>
                    <td>" . $row["category_id"] . "</td>
                    <td>" . $row["product_code"] . "</td>
                    <td>" . $row["is_active"] . "</td>
                    <td>" . $row["created_at"] . "</td>
                    <td>" . $row["description"] . "</td>
                    <td>" . $row["price"] . "</td>
                    <td>" . $row["unit"] . "</td>
                    <td>" . $row["discount_amount"] . "</td>
                    <td>" . $row["stock"] . "</td>
                    <td>" . $row["image"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada hasil yang ditemukan.</p>";
    }
    // Menutup koneksi
    $koneksi->close();
}
?>

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