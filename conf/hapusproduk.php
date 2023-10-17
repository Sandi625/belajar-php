<?php
include 'con_tbproduk.php';

$id=$_POST['id'];


$query=mysqli_query($koneksi, "
delete from products WHERE id = '$id';
");

if ($query){
    ?>
    <script type="text/javascript">
        alert("Hapus data berhasil");
        window.location='../app/crud2.php';
        </script>
    
    <?php

}else{
    ?>
    <script type="text/javascript">
        alert("Ada kesalahan saat Hapus ke database");
        window.location='../app/crud2.php';
        </script>
    
        <?php
}


?>