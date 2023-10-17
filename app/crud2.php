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
              $no = 0;
              $query = mysqli_query($koneksi, "select * from products");
              while ($row = mysqli_fetch_assoc($query)) {
                $no++;
              ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['product_name'] ?></td>
                  <td><?php echo $row['category_id'] ?></td>
                  <td><?php echo $row['product_code'] ?></td>
                  <td><?php echo $row['is_active'] ?></td>
                  <td><?php echo $row['created_at'] ?></td>
                  <td><?php echo $row['description'] ?></td>
                  <td><?php echo $row['price'] ?></td>
                  <td><?php echo $row['unit'] ?></td>
                  <td><?php echo $row['discount_amount'] ?></td>
                  <td><?php echo $row['stock'] ?></td>
                  <td><?php echo $row['image'] ?></td>
                  <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?php echo $row['id'] ?>">
                      Edit
                    </button>
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
          <form action="../conf/hapusproduk.php" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Anda yakin mau hapus data atas nama</label>
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <input type="text" class="form-control" name="product_name" placeholder="Enter NIS" value="<?php echo $row['product_name'] ?>" readonly>
              </div>
            
             

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
                <!-- dan id nya harus sama dengan button -->
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
          <form action="../conf/editproduk.php" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama_produk</label>
                <input type="text" class="form-control" name="product_name" placeholder="Enter NIS">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Kategori</label>
                <input type="number" class="form-control" name="category_id" placeholder="Enter Nama">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Kode_produk</label>
                <input type="text" class="form-control" name="product_code" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Aktif</label>
                <input type="number" class="form-control" name="is_active" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal edit</label>
                <input type="datetime-local" class="form-control" name="updated_at" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Deskripsi</label>
                <input type="text" class="form-control" name="description" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Harga</label>
                <input type="text" class="form-control" name="price" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Unit</label>
                <input type="text" class="form-control" name="unit" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Diskon</label>
                <input type="text" class="form-control" name="discount_amount" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Stock</label>
                <input type="number" class="form-control" name="stock" placeholder="Enter Adress">
              </div>
              <div class="form-group">
    <label for="exampleInputPassword1">Gambar</label>
    <input type="file" class="form-control" name="image" accept="image/*" required>
    </div>

             
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
              <?php
              }
              ?>


            </tbody>
          </table>
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
          <form action="../conf/tambahproduk.php" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama_produk</label>
                <input type="text" class="form-control" name="product_name" placeholder="Enter NIS">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Kategori</label>
                <input type="number" class="form-control" name="category_id" placeholder="Enter Nama">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Kode_produk</label>
                <input type="text" class="form-control" name="product_code" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Aktif</label>
                <input type="number" class="form-control" name="is_active" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tanggal</label>
                <input type="datetime-local" class="form-control" name="created_at" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Deskripsi</label>
                <input type="text" class="form-control" name="description" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Harga</label>
                <input type="text" class="form-control" name="price" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Unit</label>
                <input type="text" class="form-control" name="unit" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Diskon</label>
                <input type="text" class="form-control" name="discount_amount" placeholder="Enter Adress">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Stock</label>
                <input type="number" class="form-control" name="stock" placeholder="Enter Adress">
              </div>
              <label for="exampleInputPassword1">Gambar</label>
    <input type="file" class="form-control" name="image" accept="image/*" required>
    </div>
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