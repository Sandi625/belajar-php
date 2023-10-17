<?php
include 'con_tbsiswa.php';
$id_siswa=$_POST['id_siswa'];
$nis=$_POST['nis'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];

$query=mysqli_query($koneksi, "update tb_siswa SET nis='$nis',nama='$nama',alamat='$alamat' WHERE id_siswa = '$id_siswa';
");

if ($query){
    ?>
    <script type="text/javascript">
        alert("edit data berhasil");
        window.location='../app/crud.php';
        </script>
    
    <?php

}else{
    ?>
    <script type="text/javascript">
        alert("Ada kesalahan saat Update ke database");
        window.location='../app/crud.php';
        </script>
    
        <?php
}
?>