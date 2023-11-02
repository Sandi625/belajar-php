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
    }
    public function getKoneksi()
    {
        return $this->koneksi;
    }
    public function closeKoneksi()
    {
        $this->koneksi->close();
    }
}
$database = new Database();
$koneksi = $database->getKoneksi();
?>
