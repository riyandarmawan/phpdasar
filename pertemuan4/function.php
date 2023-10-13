<?php 
    // hal yang harus di perhatikan ketika membuat user-defined function:
    // 1. harus di definisikan terlebih dahulu
    // 2. setelah di definisikan baru bisa di panggil

    function salam($nama = "Jangkung",) {
        return "Selamat Malam, $nama!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function</title>
</head>
<body>
    <h1><?= salam(); ?></h1>
</body>
</html>