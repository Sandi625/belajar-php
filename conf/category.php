<!--?php
include 'con_tbproduk.php';

$query= "select * from products";
$sql_rm = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));


$query = mysqli_query($koneksi, "select * from products 
INNER JOIN product_categories ON products.category_id = product_categories.id");
while ($row = mysqli_fetch_assoc($query)) {
  $no++;

// ?>


"select * from products 
              INNER JOIN product_categories ON products.category_id = product_categories.id"



              "select * from products 
              INNER JOIN product_categories ON products.category_id = product_categories.id"




              $query = mysqli_query($koneksi,"select * from products 
              INNER JOIN product_categories ON products.category_id = product_categories.id");
              while ($row = mysqli_fetch_assoc($query)) {
                $no++;





                $no = 0;
              $query = mysqli_query($koneksi,"select * from products 
              INNER JOIN product_categories ON products.category_id = product_categories.id");
              while ($row = mysqli_fetch_assoc($query)) {
                $no++; -->