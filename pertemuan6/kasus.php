<?php 
$pemainBola = [
    [
        "nama" => "Lionel Messi",
        "klub" => "Inter Miami",
        "tinggi" => "170 cm",
        "kebangsaan" => "Argentina",
        "umur" => "36 tahun",
        "gambar" => "messi.jpg",
    ],
    [
        "nama" => "Cristiano Ronaldo",
        "klub" => "Al Nassr",
        "tinggi" => "187 cm",
        "kebangsaan" => "Portugal",
        "umur" => "38 tahun",
        "gambar" => "ronaldo.jpg",
    ],
    [
        "nama" => "Neymar",
        "klub" => "Al Hilal",
        "tinggi" => "175 cm",
        "kebangsaan" => "Brazil",
        "umur" => "31 tahun",
        "gambar" => "neymar.jpg",
    ],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemain Bola</title>
</head>
<body>
    <h1>Daftar Pemain Bola</h1>

    <?php foreach($pemainBola as $bola) : ?>
        <ul>
            <li>
                <img src="img/<?= $bola["gambar"]; ?>" alt="">
            </li>
            <li>Nama : <?= $bola["nama"]; ?></li>
            <li>klub : <?= $bola["klub"]; ?></li>
            <li>Tinggi : <?= $bola["tinggi"]; ?></li>
            <li>Kebangsaan : <?= $bola["kebangsaan"]; ?></li>
            <li>Umur : <?= $bola["umur"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>