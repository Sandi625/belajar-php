<?php
include 'con_tbproduk.php';
class HapusProduk {
    private $id;
    private $koneksi;
    // Constructor  untuk menginisialisasi properti objek
    public function __construct($id, $koneksi) {
        $this->id = $id;
        $this->koneksi = $koneksi;
    }
    // Method untuk delete produk database
    public function deleteProduct() {
        $query = mysqli_query($this->koneksi, "DELETE FROM products WHERE id = '$this->id'");
        if ($query) {
            $this->redirectWithAlert("Hapus data berhasil");
        } else {
            $this->redirectWithAlert("Ada kesalahan saat Hapus ke database");
        }
    }
    // Method untuk memunculkan pesan alert
    private function redirectWithAlert($message) {
        ?>
        <script type="text/javascript">
            alert("<?php echo $message; ?>");
            window.location = '../app/crud2.php';
        </script>
        <?php
    }
}
// Ambil data dari $_POST dan buat objek delete produk
$id = $_POST['id'];
$productDeletion = new HapusProduk($id, $koneksi);

// Delete produk
$productDeletion->deleteProduct();
?>
