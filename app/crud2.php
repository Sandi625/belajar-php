<?php
include '../conf/con_tbproduk.php';
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

  <!-- /.content-header -->
  <?php include('navbarsidebar.php'); ?>
  <!-- Main content -->
  <!-- /.row -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
            Tambahkan Produk
          </button>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama_produk</th>
                <th>Kategori</th>
                <th>Kode_produk</th>
                <th>Aktif</th>
                <th>Tanggal Buat dan Update</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Unit</th>
                <th>Diskon</th>
                <th>Stock</th>
                <th>Gambar_Produk</th>
                <th>Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php

              $banyakdataperhal = 5;
              $banyakdata = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM products"));
              $banyakHal = ceil($banyakdata / $banyakdataperhal);
              if (isset($_GET['halaman'])) {
                $halamanaktif = $_GET['halaman'];
              } else {
                $halamanaktif = 1;
              }
              $dataawal = ($halamanaktif - 1) * $banyakdataperhal;
              $no = 0;
              mysqli_query($koneksi, "CREATE OR REPLACE VIEW product_view AS
        SELECT products.*, product_categories.category_name 
        FROM products 
        INNER JOIN product_categories ON products.category_id = product_categories.id");
              $query = mysqli_query($koneksi, "SELECT * FROM product_view 
        LIMIT $dataawal, $banyakdataperhal");

              while ($row = mysqli_fetch_assoc($query)) {
                $no++;

              ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['product_name'] ?></td>
                  <td><?php echo $row['category_name'] ?></td>
                  <td><?php echo $row['product_code'] ?></td>
                  <td><?php echo $row['is_active'] ?></td>
                  <td><?php echo $row['created_at'] ?></td>
                  <td><?php echo $row['description'] ?></td>
                  <td><?php echo $row['price'] ?></td>
                  <td><?php echo $row['unit'] ?></td>
                  <td><?php echo $row['discount_amount'] ?></td>
                  <td><?php echo $row['stock'] ?></td>
                  <td>
                    <?php
                    $imagePaths = json_decode($row["image"]);
                    if (!empty($imagePaths)) {
                      foreach ($imagePaths as $imagePath) {
                    ?>
                        <img src="<?= $imagePath ?>" alt="" style="width: 100px; height: 100px;">
                    <?php
                      }
                    } else {
                      echo "Tidak ada gambar";
                    }
                    ?>
                  </td>

                  <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?php echo $row['id'] ?>">
                      Edit
                    </button>
                  </td>
                  <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $row['id'] ?>">
                      Hapus
                    </button>
                  </td>


                </tr>


                <div class="modal fade" id="modal-hapus<?php echo $row['id'] ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus data </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- form start -->
                        <form action="../conf/hapusproduk.php" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Anda yakin mau hapus data atas nama</label>
                              <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                              <input type="text" class="form-control" name="product_name" placeholder="Enter NIS" value="<?php echo htmlspecialchars($row['product_name']); ?>" readonly>
                            </div>
                            <input type="hidden" name="gambar" value="<?php echo htmlspecialchars($row['image']); ?>">
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>
        </div>
      </div>



      <!-- edit -->

      <!-- button edit harus di taruh dibawah tr agar bisa -->

      <div class="modal fade" id="modal-edit<?php echo $row['id'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form action="../conf/editproduk.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama_produk</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Enter Nama produk" value="<?php echo $row['product_name'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kategori</label>
                    <select class="form-control" name="category_id">
                      <option value="1" <?php echo ($row['category_id'] == 1) ? 'selected' : ''; ?>>id 1: Sports</option>
                      <option value="2" <?php echo ($row['category_id'] == 2) ? 'selected' : ''; ?>>id 2: Daily</option>
                      <option value="3" <?php echo ($row['category_id'] == 3) ? 'selected' : ''; ?>>id 3: Accessories</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kode_produk</label>
                    <input type="text" class="form-control" name="product_code" placeholder="Enter kode produk" value="<?php echo $row['product_code'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Aktif</label>
                    <input type="number" class="form-control" name="is_active" placeholder="Enter angka aktif" value="<?php echo $row['is_active'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal edit</label>
                    <input type="datetime-local" class="form-control" name="updated_at" value="<?php echo date('Y-m-d\TH:i', strtotime($row['updated_at'])) ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deskripsi</label>
                    <input type="text" class="form-control" name="description" placeholder="Enter Deskripsi" value="<?php echo $row['description'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" class="form-control" name="price" placeholder="Enter Harga" value="<?php echo $row['price'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Unit</label>
                    <input type="text" class="form-control" name="unit" placeholder="Enter Unit" value="<?php echo $row['unit'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Diskon</label>
                    <input type="text" class="form-control" name="discount_amount" placeholder="Enter Diskon" value="<?php echo $row['discount_amount'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Stock</label>
                    <input type="number" class="form-control" name="stock" placeholder="Enter stock" value="<?php echo $row['stock'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Gambar Baru</label>
                    <input type="file" class="form-control" name="images[]" accept="image/*" multiple>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Gambar yang Sudah Ada</label>
                    <?php
                    $imagePaths = json_decode($row["image"]);
                    if (!empty($imagePaths)) {
                      foreach ($imagePaths as $imagePath) {
                        echo "<img src='$imagePath' alt='' style='width: 100px; height: 100px;'><br>";
                      }
                    } else {
                      echo "Tidak ada gambar";
                    }
                    ?>
                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php
              }
    ?>


    </tbody>
    </table>
    <nav>
      <ul class="pagination justify-content-center">
        <!-- ini merupakan bagian tombol sebelumnya -->
        <?php if ($halamanaktif <= 1) { ?>
          <li class="page-item disabled"><a href="?halaman=<?php echo $halamanaktif - 1; ?>" class="page-link">Sebelumnya</a></li>



        <?php } else { ?>

          <li class="page-item"><a href="?halaman=<?php echo $halamanaktif - 1; ?>" class="page-link">Sebelumnya</a></li>
          <!-- Akhir tombol sebelumnya -->
        <?php } ?>

        <?php for ($i = 1; $i <= $banyakHal; $i++) {

        ?>
          <li class="page-item"><a href="?halaman=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
        <?php } ?>

        <!-- ini merupakan bagian tombol selanjutnya -->
        <?php if ($halamanaktif >= $banyakHal) { ?>
          <li class="page-item disabled"><a href="?halaman=<?php echo $halamanaktif + 1; ?>" class="page-link">Selanjutnya</a></li>



        <?php } else { ?>

          <li class="page-item"><a href="?halaman=<?php echo $halamanaktif + 1; ?>" class="page-link">Selanjutnya</a></li>
          <!-- Akhir tombol selanjutnya -->
        <?php } ?>

      </ul>
    </nav>





    <!-- ... (kode lainnya) ... -->




    <!-- ... (bagian HTML lainnya) ... -->

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  </div>
  <!-- /.row -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah produk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form action="../conf/tambahproduk.php" method="POST" enctype="multipart/form-data">>
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama_produk</label>
                <input type="text" class="form-control" name="product_name" placeholder="Enter nama produk">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Kategori</label>
                <select class="form-control" name="category_id">
                  <option value="1">id 1: Sports</option>
                  <option value="2">id 2: Daily</option>
                  <option value="3">id 3: Accessories</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Kode_produk</label>
                <input type="text" class="form-control" name="product_code" placeholder="Enter Kode produk">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Aktif</label>
                <input type="number" class="form-control" name="is_active" placeholder="Enter No aktif">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal</label>
                <input type="datetime-local" class="form-control" name="created_at" placeholder="Tanggal">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Deskripsi</label>
                <input type="text" class="form-control" name="description" placeholder="Enter Deskripsi">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Harga</label>
                <input type="text" class="form-control" name="price" placeholder="Enter Harga">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Unit</label>
                <input type="text" class="form-control" name="unit" placeholder="Enter Unit">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Diskon</label>
                <input type="text" class="form-control" name="discount_amount" placeholder="Enter Diskon">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Stock</label>
                <input type="number" class="form-control" name="stock" placeholder="Enter stock">
              </div>
              <label for="exampleFormControlInput1" class="form-label">Foto</label>
              <input type="file" name="images[]" multiple />


              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



  <!-- /.modal -->

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