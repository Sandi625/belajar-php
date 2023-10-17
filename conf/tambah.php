<?php
include 'con_tbsiswa.php';

$nis=$_POST['nis'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];

$query=mysqli_query($koneksi, "insert into tb_siswa values('','$nis','$nama','$alamat');
");

if ($query){
    ?>
    <script type="text/javascript">
        alert("tambah data berhasil");
        window.location='../app/crud.php';
        </script>
    
    <?php

}else{
    ?>
    <script type="text/javascript">
        alert("Ada kesalahan input ke database");
        window.location='../app/crud.php';
        </script>
    
        <?php
}
?>