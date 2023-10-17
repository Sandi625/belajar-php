<?php
include '../conf/con_tbsiswa.php';
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
            Tambahkan Siswa
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
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              $query = mysqli_query($koneksi, "select * from tb_siswa");
              while ($row = mysqli_fetch_assoc($query)) {
                $no++;
              ?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['nis'] ?></td>
                  <td><?php echo $row['nama'] ?></td>
                  <td><?php echo $row['alamat'] ?></td>
                  <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?php echo $row['id_siswa'] ?>">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus<?php echo $row['id_siswa'] ?>">
                      Hapus
                    </button>

                  </td>
                </tr>
                              
    <div class="modal fade" id="modal-hapus<?php echo $row['id_siswa'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus data siswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form action="../conf/hapus.php" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Anda yakin mau hapus data atas nama</label>
                <input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa'] ?>">
                <input type="text" class="form-control" name="nama" placeholder="Enter NIS" value="<?php echo $row['nama'] ?>" readonly>
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
  <div class="modal fade" id="modal-edit<?php echo $row['id_siswa'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit data siswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form action="../conf/edit.php" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">NIS</label>
                <input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa'] ?>">
                <input type="number" class="form-control" name="nis" placeholder="Enter NIS" value="<?php echo $row['nis'] ?>">
              </div>
             
              <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Enter Nama" value="<?php echo $row['nama'] ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Enter Adress" value="<?php echo $row['alamat'] ?>">
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
          <h4 class="modal-title">Tambah Siswa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <form action="../conf/tambah.php" method="POST">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">NIS</label>
                <input type="number" class="form-control" name="nis" placeholder="Enter NIS">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Enter Nama">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="Enter Adress">
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