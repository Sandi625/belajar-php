<?php
include 'con_tbproduk.php';

$product_name=$_POST['product_name'];
$category_id=$_POST['category_id'];
$product_code=$_POST['product_code'];
$is_active=$_POST['is_active'];
$created_at=$_POST['created_at'];
$description=$_POST['description'];
$price=$_POST['price'];
$unit=$_POST['unit'];
$discount_amount=$_POST['discount_amount'];
$stock=$_POST['stock'];
$image=$_POST['image'];


$query = mysqli_query($koneksi, "INSERT INTO products (product_name, category_id, product_code, is_active, created_at, description, price, unit, discount_amount, stock, image) VALUES ('$product_name', '$category_id', '$product_code', '$is_active', '$created_at', '$description', '$price', '$unit', '$discount_amount', '$stock','$image')");


if ($query){
    ?>
    <script type="text/javascript">
        alert("tambah data berhasil");
        window.location='../app/crud2.php';
        </script>
    
    <?php

}else{
    ?>
    <script type="text/javascript">
        alert("Ada kesalahan input ke database");
        window.location='../app/crud2.php';
        </script>
    
        <?php
}







?>