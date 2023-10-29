<?php
include 'con_tbproduk.php';

$id = $_POST['id'];
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

// Mengonversi data JSON yang sudah ada ke dalam bentuk array
$imagePaths = json_decode($row["image"]);

// Mengonversi gambar yang baru diunggah ke dalam bentuk array
if (!empty($_FILES['images']['name'])) {
    foreach ($_FILES['images']['name'] as $key => $val) {
        $file = $_FILES['images']['name'][$key];
        $file_tmp = $_FILES['images']['tmp_name'][$key];
        move_uploaded_file($file_tmp, "../app/file/" . $file);
        $imagePaths[] = "../app/file/" . $file;
    }
}

// Menyimpan informasi produk dan lokasi file ke dalam database
$query = mysqli_query($koneksi, "UPDATE products SET 
    product_name = '$product_name',
    category_id = '$category_id',
    product_code = '$product_code',
    is_active = '$is_active',
    updated_at = '$updated_at',
    description = '$description',
    price = '$price',
    unit = '$unit',
    discount_amount = '$discount_amount',
    stock = '$stock',
    image = '" . json_encode($imagePaths) . "'
    WHERE id = $id");

if ($query) {
    header("Location: ../app/crud2.php");
} else {
    echo "Ada kesalahan saat mengedit data.";
}
?>
