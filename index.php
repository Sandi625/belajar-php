<?php
require 'function.php';


$select = new Select();

if(!empty($_SESSION["id"])){
  $user = $select->selectUserById($_SESSION["id"]);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Index</title>
  <link rel="stylesheet" href="app/css/welcome.css">
</head>
<body>
  <div class="container">
    <h1>Welcome <?php echo $user["name"]; ?></h1>
    <button onclick="window.location.href='app/dasbor.php'">Klik Disini untuk ke dashboard</button>
  </div>
</body>
</html>

