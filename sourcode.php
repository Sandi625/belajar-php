<td> <?php $directory = 'file/';
$files = scandir($directory);
foreach ($files as $file) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'jpg' || pathinfo($file, PATHINFO_EXTENSION) === 'png') {
        echo "<td><img src='{$directory}{$file}' alt='{$file}' style='width: 100px; height: 100px;'></td>";
    }
}
?>



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




<td><img src='file/<?php echo $row['image']; ?>' alt='<?php echo $row['image']; ?>' style='width: 100px; height: 100px;'></td>