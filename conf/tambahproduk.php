<?php
include 'con_tbproduk.php';
class TambahProduk {
    private $productName;
    private $categoryId;
    private $productCode;
    private $isActive;
    private $createdAt;
    private $description;
    private $price;
    private $unit;
    private $discountAmount;
    private $stock;
    private $imagePaths = [];

    // Constructor untuk menginisialisasi properti objek
    public function __construct($productName, $categoryId, $productCode, $isActive, $createdAt, $description, $price, $unit, $discountAmount, $stock) {
        $this->productName = $productName;
        $this->categoryId = $categoryId;
        $this->productCode = $productCode;
        $this->isActive = $isActive;
        $this->createdAt = $createdAt;
        $this->description = $description;
        $this->price = $price;
        $this->unit = $unit;
        $this->discountAmount = $discountAmount;
        $this->stock = $stock;
    }
    // Method untuk menambahkan iamge
    public function addImagePaths($imagePaths) {
        $this->imagePaths = array_merge($this->imagePaths, $imagePaths);
    }
    // Method untuk menyimpan data ke database
    public function saveToDatabase() {
        global $koneksi;  
        // convert gambar array ke path JSON
        $jsonImagePaths = json_encode($this->imagePaths);
        // Menyimpan informasi produk dan lokasi file ke database
        $query = mysqli_query($koneksi, "INSERT INTO products (product_name, category_id, product_code, is_active, created_at, description, price, unit, discount_amount, stock, image) VALUES ('$this->productName', '$this->categoryId', '$this->productCode', '$this->isActive', '$this->createdAt', '$this->description', '$this->price', '$this->unit', '$this->discountAmount', '$this->stock', '$jsonImagePaths')");
        //Kondisi jika gagal dan berhasil input ke database
        if ($query) {
            ?>
            <script type="text/javascript">
                alert("Tambah data berhasil");
                window.location = '../app/crud2.php';
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Ada kesalahan input ke database");
                window.location = '../app/crud2.php';
            </script>
            <?php
        }
    }
}

//Ambil data dari $_POST dan buat objek Produk
$product_name = $_POST['product_name'];
$category_id = $_POST['category_id'];
$product_code = $_POST['product_code'];
$is_active = $_POST['is_active'];
$created_at = $_POST['created_at'];
$description = $_POST['description'];
$price = $_POST['price'];
$unit = $_POST['unit'];
$discount_amount = $_POST['discount_amount'];
$stock = $_POST['stock'];

// Membuat object Produk
$product = new TambahProduk($product_name, $category_id, $product_code, $is_active, $created_at, $description, $price, $unit, $discount_amount, $stock);

// Ambil lokasi path gambar dari file yang diunggah dan tambahkan ke objek Produk
$location = "../app/file/";
$imagePaths = [];
foreach ($_FILES['images']['name'] as $key => $val) {
    $file = $_FILES['images']['name'][$key];
    $file_tmp = $_FILES['images']['tmp_name'][$key];
    move_uploaded_file($file_tmp, $location . $file);
    $imagePaths[] = $location . $file;
}
$product->addImagePaths($imagePaths);

// Simpan produk ke database
$product->saveToDatabase();
?>
