<?php
include 'con_tbsiswa.php';
$id_siswa=$_POST['id_siswa'];


$query=mysqli_query($koneksi, "
delete from tb_siswa WHERE id_siswa= '$id_siswa';
");

if ($query){
    ?>
    <script type="text/javascript">
        alert("Hapus data berhasil");
        window.location='../app/crud.php';
        </script>
    
    <?php

}else{
    ?>
    <script type="text/javascript">
        alert("Ada kesalahan saat Hapus ke database");
        window.location='../app/crud.php';
        </script>
    
        <?php
}
?>