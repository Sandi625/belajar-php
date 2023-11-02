<td> <?php $directory = 'file/';
$files = scandir($directory);
foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'jpg' || pathinfo($file, PATHINFO_EXTENSION) === 'png') {
        echo "<td><img src='{$directory}{$file}' alt='{$file}' style='width: 100px; height: 100px;'></td>";
    }
}
?>



<?php
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "produk";

    protected $koneksi;

    public function __construct()
    {
        $this->koneksi = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->koneksi->connect_error) {
            die("Tidak dapat tersambung ke database: " . $this->koneksi->connect_error);
        }

        return $this->koneksi;
    }
}
?>





<?php
$koneksi=mysqli_connect("localhost","root","","produk");



?>


















<?php

$banyakdataperhal = 5;
$banyakdata = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM products"));
$banyakHal = ceil($banyakdata / $banyakdataperhal);
if (isset($_GET['halaman'])) {
  $halamanaktif = $_GET['halaman'];
} else {
  $halamanaktif = 1;
}
$dataawal = ($halamanaktif - 1) * $banyakdataperhal;
$no = 0;
mysqli_query($koneksi, "CREATE OR REPLACE VIEW product_view AS
SELECT products.*, product_categories.category_name 
FROM products 
INNER JOIN product_categories ON products.category_id = product_categories.id");
$query = mysqli_query($koneksi, "SELECT * FROM product_view 
LIMIT $dataawal, $banyakdataperhal");

while ($row = mysqli_fetch_assoc($query)) {
  $no++;

?>
  <tr>
    <td><?php echo $no ?></td>
    <td><?php echo $row['product_name'] ?></td>
    <td><?php echo $row['category_name'] ?></td>
    <td><?php echo $row['product_code'] ?></td>
    <td><?php echo $row['is_active'] ?></td>
    <td><?php echo $row['created_at'] ?></td>
    <td><?php echo $row['description'] ?></td>
    <td><?php echo $row['price'] ?></td>
    <td><?php echo $row['unit'] ?></td>
    <td><?php echo $row['discount_amount'] ?></td>
    <td><?php echo $row['stock'] ?></td>
    <td>
      <?php
      $imagePaths = json_decode($row["image"]);
      if (!empty($imagePaths)) {
        foreach ($imagePaths as $imagePath) {
      ?>
          <img src="<?= $imagePath ?>" alt="" style="width: 100px; height: 100px;">
      <?php
        }
      } else {
        echo "Tidak ada gambar";
      }
      ?>
    </td>














    edit::
    <?php
include 'con_tbproduk.php';
class EditProduk
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function editProduct($id, $product_name, $category_id, $product_code, $is_active, $updated_at, $description, $price, $unit, $discount_amount, $stock, $images)
    {
        // Menghapus gambar lama dari direktori file
        $this->hapusGambarLama($id);

        // Mengonversi gambar yang baru diunggah ke dalam bentuk array
        $imagePaths = [];
        foreach ($images['name'] as $key => $val) {
            $file = $images['name'][$key];
            $file_tmp = $images['tmp_name'][$key];
            $location = "../app/file/" . $file;
            move_uploaded_file($file_tmp, $location);
            $imagePaths[] = $location;
        }

        // Menyimpan informasi produk dan lokasi file ke dalam database
        $jsonImagePaths = json_encode($imagePaths);
        $query = mysqli_query($this->koneksi, "UPDATE products SET 
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
            image = '$jsonImagePaths'
            WHERE id = $id");

        // Cek apakah query berhasil dijalankan atau tidak
        return $query;
    }

    private function hapusGambarLama($id)
    {
        $result = mysqli_query($this->koneksi, "SELECT image FROM products WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        $imagePaths = json_decode($row['image']);

        // Hapus gambar lama dari direktori file
        foreach ($imagePaths as $imagePath) {
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}

// Penggunaan kelas ProductManager
$productManager = new EditProduk($koneksi);

// Mendapatkan data dari formulir POST
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
$images = $_FILES['images'];

// Memanggil metode editProduct
$editResult = $productManager->editProduct($id, $product_name, $category_id, $product_code, $is_active, $updated_at, $description, $price, $unit, $discount_amount, $stock, $images);

if ($editResult) {
    // Berhasil mengedit produk
    header("Location: ../app/crud2.php");
} else {
    // Gagal mengedit produk
    echo "Ada kesalahan saat mengedit data.";
}

?>








<!-- tambah -->


<?php
include 'con_tbproduk.php';

class Tambahproduk
{
    private $koneksi;
    private $fileLocation = "../app/file/";

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function tambahProduk($product_name, $category_id, $product_code, $is_active, $created_at, $description, $price, $unit, $discount_amount, $stock, $images)
    {
       
        $checkQuery = mysqli_query($this->koneksi, "SELECT * FROM products WHERE product_code = '$product_code'");
        if (mysqli_num_rows($checkQuery) > 0) {
         
            return false; 
        }
    
        $jsonImagePaths = json_encode($this->simpanGambar($images));
    
        $query = mysqli_query($this->koneksi, "INSERT INTO products (product_name, category_id, product_code, is_active, created_at, description, price, unit, discount_amount, stock, image) VALUES ('$product_name', '$category_id', '$product_code', '$is_active', '$created_at', '$description', '$price', '$unit', '$discount_amount', '$stock', '$jsonImagePaths')");
    
        return $query;
    }
    
    private function simpanGambar($images)
    {
        $imagePaths = [];
        foreach ($images['name'] as $key => $val) {
            $file = $images['name'][$key];
            $file_tmp = $images['tmp_name'][$key];
            move_uploaded_file($file_tmp, $this->fileLocation . $file);
            $imagePaths[] = $this->fileLocation . $file;
        }
        return $imagePaths;
    }
}


$productManager = new Tambahproduk($koneksi);

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

if (isset($_FILES['images'])) {
    $result = $productManager->tambahProduk($product_name, $category_id, $product_code, $is_active, $created_at, $description, $price, $unit, $discount_amount, $stock, $_FILES['images']);
    if ($result) {
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




?>
