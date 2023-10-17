<?php
include 'con_tbproduk.php';

$product_name = $_POST['product_name'];
$category_id = $_POST['category_id'];
$product_code = $_POST['product_code'];
$is_active = $_POST['is_active'];
$updated_at = $_POST['updated_at'];
$description = $_POST['description'];
$price = $_POST['price'];
$unit = $_POST['unit'];
$discount_amount = $_POST['discount_amount'];
$stock = $_POST['stock'];
$image = $_POST['image'];

// Query untuk melakukan update data ke dalam tabel products
$query = mysqli_query($koneksi, "UPDATE products SET 
    product_name = '$product_name',
    category_id = '$category_id',
    is_active = '$is_active',
    updated_at = '$updated_at',
    description = '$description',
    price = '$price',
    unit = '$unit',
    discount_amount = '$discount_amount',
    stock = '$stock',
    image = '$image'
    WHERE product_code = '$product_code'");

if ($query){
    ?>
    <script type="text/javascript">
        alert("edit data berhasil");
        window.location='../app/crud2.php';
        </script>
    
    <?php

}else{
    ?>
    <script type="text/javascript">
        alert("Ada kesalahan saat Update ke database");
        window.location='../app/crud2.php';
        </script>
    
        <?php
}
?>
