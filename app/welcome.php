<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head>
<body>
    <?php
    session_start();

    ?>
    <h2>Selamat Datang <?php echo $_SESSION['nama_lengkap'];?> </h2>
    <!-- <a href="logout.php">Logout</a> -->
    
</body>
</html>