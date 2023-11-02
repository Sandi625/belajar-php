<?php
include 'con_tbproduk.php';

class EditProduk {
    private $id;
    private $productName;
    private $categoryId;
    private $productCode;
    private $isActive;
    private $updatedAt;
    private $description;
    private $price;
    private $unit;
    private $discountAmount;
    private $stock;
    private $imagePaths = [];

    public function __construct($id, $productName, $categoryId, $productCode, $isActive, $updatedAt, $description, $price, $unit, $discountAmount, $stock) {
        $this->id = $id;
        $this->productName = $productName;
        $this->categoryId = $categoryId;
        $this->productCode = $productCode;
        $this->isActive = $isActive;
        $this->updatedAt = $updatedAt;
        $this->description = $description;
        $this->price = $price;
        $this->unit = $unit;
        $this->discountAmount = $discountAmount;
        $this->stock = $stock;
    }  
    public function addImagePaths($imagePaths) {
        $this->imagePaths = array_merge($this->imagePaths, $imagePaths);
    }
    // Method untuk update data di database
    public function updateProduct() {
        global $koneksi;
        $query = mysqli_query($koneksi, "UPDATE products SET 
            product_name = '{$this->productName}',
            category_id = '{$this->categoryId}',
            product_code = '{$this->productCode}',
            is_active = '{$this->isActive}',
            updated_at = '{$this->updatedAt}',
            description = '{$this->description}',
            price = '{$this->price}',
            unit = '{$this->unit}',
            discount_amount = '{$this->discountAmount}',
            stock = '{$this->stock}',
            image = '" . json_encode($this->imagePaths) . "'
            WHERE id = '{$this->id}'");

        if ($query) {
            header("Location: ../app/crud2.php");
        } else {
            echo "Ada kesalahan saat mengedit data.";
        }
    }
}
// Ambil data dari $_POST dan buat objek Produk
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
// Membuat object produk
$product = new EditProduk($id, $product_name, $category_id, $product_code, $is_active, $updated_at, $description, $price, $unit, $discount_amount, $stock);
$imagePaths = json_decode($row["image"]);
if (!empty($_FILES['images']['name'])) {
    foreach ($_FILES['images']['name'] as $key => $val) {
        $file = $_FILES['images']['name'][$key];
        $file_tmp = $_FILES['images']['tmp_name'][$key];
        move_uploaded_file($file_tmp, "../app/file/" . $file);
        $product->addImagePaths(["../app/file/" . $file]);
    }
}


// Update produk
$product->updateProduct();
?>
