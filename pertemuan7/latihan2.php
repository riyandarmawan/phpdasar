<?php
// cek apakah tidak ada data di $_GET
if(!isset($_GET["nama"]) ||
   !isset($_GET["klub"]) || 
   !isset($_GET["tinggi"]) || 
   !isset($_GET["kebangsaan"]) || 
   !isset($_GET["umur"]) || 
   !isset($_GET["gambar"]) 
   ) {
    // redirect
    header("Location: latihan1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemain Bola</title>
</head>
<body>
    <ul>
        <li><img src="img/<?= $_GET["gambar"]; ?>" alt=""></li>
        <li><?= $_GET["nama"]; ?></li>
        <li><?= $_GET["klub"]; ?></li>
        <li><?= $_GET["tinggi"]; ?></li>
        <li><?= $_GET["kebangsaan"]; ?></li>
        <li><?= $_GET["umur"]; ?></li>
    </ul>

    <a href="latihan1.php">Kemabali kedaftar pemain bola</a>
</body>
</html>